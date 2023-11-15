<div>
    @if ($transactionSuccess)
        <div>
            <h5>
                <span class="border-dark-1 p-2 text-green-2 me-1"  style="display: inline-flex; border-radius: 50%; width: 30px; height: 30px; align-items: center;justify-content: center;"><i class="icon-check"></i></span>
                Booking Success!
            </h5>
            <p>Dear, {{ ucwords($this->firstName.' '.$this->lastName) }}</p>
            <p>
                We have successfully received a payment of {{ $amount.' '.$package->price->currency->code }} on booking the package ( {{  $package->name }} ) 
                {{ $days>1?(' from '.date('d-F, Y',strtotime($startDate->format('Y-m-d'))).' to '.date('d-F, Y',strtotime($endDate->format('Y-m-d')))): ' on '.date('d-F, Y',strtotime($startDate->format('Y-m-d')))}}.                
            </p>
            <p>Please note the reference order id {{ '#'.$orderId }} for future use.</p>
            <p>Travelers : {{ $adultCount.' adult'.($adultCount>1?'s':'') }} {{ $childrenCount > 1?(' & '.$childrenCount.' children'.($childrenCount>1?'s':'')):'' }}</p>
        </div>
    @else            
        <div class="border-dark-1 rounded-4 p-4 mb-15">
            <div class="d-flex justify-between">    
                <h6><span class="bg-dark-1 d-inline-flex me-2 justify-center align-items-center text-white" style="width: 28px; height: 28px; border-radius: 50%;">1</span>Booking Information</h6>              
                @if ($step > 1)
                    <a href="" wire:click.prevent="editStepActivate(1)"><i class="icon-edit"></i> Edit</a>                
                @endif
            </div>        
            @if ($step == 1)           
                <div>
                    <div 
                        x-data="{
                            adultAmount : @entangle('adultAmount'),
                            childrenAmount : @entangle('childrenAmount'),
                            adultCount : @entangle('adultCount'),
                            childrenCount : @entangle('childrenCount'),  
                            days : @entangle('days'),
                            downCount(type){
                                switch(type){
                                    case 'adult' :
                                        if(this.adultCount > 1)
                                            --this.adultCount;
                                        break;
                                    case 'children' :
                                        if(this.childrenCount > 0)
                                            --this.childrenCount;
                                        break;
                                }
                            },
                            upCount(type){
                                switch(type){
                                    case 'adult' :                                
                                            ++this.adultCount;
                                        break;
                                    case 'children' :                                
                                            ++this.childrenCount;
                                        break;
                                }
                            },
                            updateDays(days){
                                this.days = days;
                            },
                            totalAmount(){                   
                                return (((parseFloat(this.adultAmount)*this.adultCount) + (parseFloat(this.childrenAmount)*this.childrenCount)) * this.days);
                            },
                            init(){
                                $refs.selectDates.flatpickr({
                                    dateFormat : 'd-m-Y',
                                    mode: 'range',
                                    minDate: 'today',
                                    onClose: function(selectedDates, dateStr, instance) {
                                        if(selectedDates[0] && selectedDates[1]){
                                            date1 = new Date(selectedDates[0]);  
                                            date2 = new Date(selectedDates[1]);  
                                            var time_difference = date2.getTime() - date1.getTime();  
                                            var days_difference = time_difference / (1000 * 60 * 60 * 24); 
                                            $dispatch('days-changed', { days: days_difference+1 });
                                        }
                                        else{
                                            @this.set('dates', null, false);
                                            $dispatch('days-changed', { days: 0 });
                                        }
                                    }
                                });                                        
                            }
                        }"
                        @days-changed="updateDays($event.detail.days)"
                        class="mt-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" wire:model="dates" x-ref="selectDates" readonly>
                                    <label class="lh-1 text-16 text-light-1" style="top: 15px;">Select Dates</label>
                                </div>
                                @error('dates')
                                    <span class="text-red-1">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="d-flex px-20 py-10 my-2 justify-between items-center counter-box">
                                    <div class="col-auto">
                                        <div class="text-15 fw-500">
                                        Adults
                                        <p>{{ $package->price->adult_amount }} <small class="text-light-1">{{ $package->price->currency->code }}</small></p>
                                        </div>
                                    </div>
            
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" @click.prevent="downCount('adult')">
                                            <i class="icon-minus text-12"></i>
                                        </button>
            
                                        <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15" x-text="adultCount"></div>
                                        </div>
            
                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" @click.prevent="upCount('adult')">
                                            <i class="icon-plus text-12"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex px-20 py-10 my-2 justify-between items-center counter-box">
                                    <div class="col-auto">
                                        <div class="text-15 fw-500">
                                        Children
                                        <p>{{ $package->price->children_amount }} <small class="text-light-1">{{ $package->price->currency->code }}</small></p>
                                        </div>
                                    </div>
            
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" @click.prevent="downCount('children')">
                                            <i class="icon-minus text-12"></i>
                                        </button>
            
                                        <div class="flex-center size-20 ml-15 mr-15">
                                            <div class="text-15" x-text="childrenCount"></div>
                                        </div>
            
                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4" @click.prevent="upCount('children')">
                                            <i class="icon-plus text-12"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="d-flex justify-between py-3">
                                    <span>Total Amount : </span>
                                    <div>
                                        <span x-text="totalAmount()"></span> <small class="text-light-1">{{ $package->price->currency->code }}</small>
                                    </div>
                                </h5>                        
                            </div>
                        </div>
                        <a href="" wire:click.prevent="submit" class="d-inline-flex button px-24 py-2 -dark-1 bg-blue-1 text-white my-2">Next</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="border-dark-1 rounded-4 p-4 mb-15">
            <div class="d-flex justify-between">  
                <h6><span class="bg-dark-1 d-inline-flex me-2 justify-center align-items-center text-white" style="width: 28px; height: 28px; border-radius: 50%;">2</span>Contact Information</h6>
                @if ($step > 2)
                    <a href="" wire:click.prevent="editStepActivate(2)"><i class="icon-edit"></i> Edit</a>                
                @endif
            </div>  
            @if ($step == 2)            
                <div>                
                    {{-- <div class="bg-light-2 rounded-4 p-1 px-3 my-3">
                        <i class="icon-user-2"></i> <a href="#">Log in or Sign-up</a> for a faster checkout 
                    </div> --}}
                    <div class="mt-10">
                        <div class="row">
                            <div class="col-lg-6 mb-10">
                                <div class="form-input ">
                                    <input type="text" wire:model="firstName" maxlength="100">
                                    <label class="lh-1 text-16 text-light-1">First Name</label>
                                </div>
                                @error('firstName')
                                    <span class="text-red-1">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-10">
                                <div class="form-input ">
                                    <input type="text" wire:model="lastName" maxlength="100">
                                    <label class="lh-1 text-16 text-light-1">Last Name</label>
                                </div>
                                @error('lastName')
                                    <span class="text-red-1">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-10">
                                <div class="form-input ">
                                    <input type="email" wire:model="email" maxlength="100">
                                    <label class="lh-1 text-16 text-light-1">Email</label>
                                </div>
                                <small class="d-block text-light-1">
                                    We'll use this email id to send you confirmation and updates about your booking.
                                </small>
                                @error('email')
                                    <span class="text-red-1">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="col-md-12 mb-10">
                                <div class="row">
                                <div class="col-4">
                                    <div class="form-input">
                                        <label class="lh-1 text-16 text-light-1" style="top: 15px;">Country</label>
                                        <select wire:model="phoneCountryCode" class="">
                                            <option value=""> -- Select Country -- </option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->code }}">{{ $country->name.' ('.$country->phonecode.') ' }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @error('phoneCountryCode')
                                        <span class="text-red-1">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="col-8">
                                    <div class="form-input ">
                                        <input type="tel" wire:model="phone" maxlength="15" onkeypress="return /^[\d./-]+$/.test(event.key)">
                                        <label class="lh-1 text-16 text-light-1">Phone Number</label>
                                    </div>
                                    @error('phone')
                                        <span class="text-red-1">{{ $message }}</span> 
                                    @enderror
                                </div>
                                </div>
                            </div>
                        </div>   
                        <a href="" wire:click.prevent="submit" class="d-inline-flex button px-24 py-2 -dark-1 bg-blue-1 text-white my-2">Next</a>
                    </div>
            </div>
            @elseif($step == 3)
                <div class="border-dark-1 rounded-4 p-4 my-2">
                    <p>Dear, {{ ucwords($this->firstName.' '.$this->lastName) }}</p>
                    <p>We'll send you the confirmation and updates about your booking to {{ $this->email }}.</p>
                </div>
            @endif
        </div>
        <div class="border-dark-1 rounded-4 p-4 mb-15">          
            <h6><span class="bg-dark-1 d-inline-flex me-2 justify-center align-items-center text-white" style="width: 28px; height: 28px; border-radius: 50%;">3</span>Payment details</h6>                   
            @if ($step == 3)
                <div 
                    x-data="payHandle()">
                    <div class="mt-10">
                        <div class="row">
                            <div class="col-12">                           
                                <p class="text-light-1">You will be charged the total amount once your order is confirmed.</p>
                                <a href="" @click.prevent="payCheckOut()" class="d-inline-flex button px-24 py-2 -dark-1 bg-blue-1 text-white my-2">
                                    Pay {{ $amount.' '.$package->price->currency->code }}
                                    <span x-show="showLoader" class="ms-1 loader"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>

@push('styles')
    <style>
        .form-input select{
            border: 1px solid var(--color-border);
            border-radius: 4px;
            padding: 0 15px;
            padding-top: 25px;
            min-height: 70px;
            transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        .counter-box{
            border: 1px solid var(--color-border);
            border-radius: 4px;
        }
        .loader {
            width: 10px;
            height: 10px;
            border: 2px solid #ffffff;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
            }

            @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        } 
    </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        function payHandle(){
            return{
                showLoader : false,
                amount : @entangle('amount'),
                email : @entangle('email'),
                phoneCountryCode : @entangle('phoneCountryCode'),
                phone : @entangle('phone'),
                payCheckOut(){
                    var options = {
                        "key": "{{ env('RAZORPAY_API_KEY') }}",
                        "amount": this.amount*100,
                        "currency": "{{ $package->price->currency->code }}",
                        "description": "{{ env('APP_NAME') }}",
                        "image": "{{ asset('img/general/logo-dark.svg') }}",
                        "prefill":
                        {
                            "email": this.email,
                            "contact":  this.phone,
                        },
                        config: {
                        display: {
                            blocks: {                         
                            },
                            hide: [],
                            sequence: [],
                            preferences: {
                            show_default_blocks: true // Should Checkout show its default blocks?
                            }
                        }
                        },
                        "handler": function (response) {
                            this.showLoader = true;
                            @this.dispatch('payment-success', { paymentId : response.razorpay_payment_id });
                        },
                        "modal": {
                            "ondismiss": function () {
                                Swal.fire(
                                    'Aborted',
                                    'Your transaction aborted as per requested.',
                                    'warning'
                                )
                            }
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                },               
            }
        }
    </script>
@endpush