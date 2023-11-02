
@extends('web.layout.app')

@section('content')

  <div class="header-margin"></div>
  <section class="layout-pt-md layout-pb-lg bg-light-2">
    <div class="container">
      <div class="row y-gap-30">                
        <div class="col-lg-8">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <div class="d-lg-none">          
              <h5>Package Information</h5>
            </div>
            <div class="border-dark-1 rounded-4 p-4">
              <h6><span class="bg-dark-1 d-inline-flex me-2 justify-center align-items-center text-white" style="width: 28px; height: 28px; border-radius: 50%;">2</span>Contact Information</h6>
              <p class="py-1">We'll use this information to send you confirmation and updates about your booking</p>
              <div class="bg-light-2 rounded-4 p-1 px-3">
                <i class="icon-user-2"></i> <a href="">Log in or Sign-up</a> for a faster checkout 
              </div>
              <div class="mt-10">
                <div class="row">
                  <div class="col-lg-6 mb-10">
                    <div class="form-input ">
                      <input type="text" required="" maxlength="100">
                      <label class="lh-1 text-16 text-light-1">First Name</label>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-10">
                    <div class="form-input ">
                      <input type="text" required="" maxlength="100">
                      <label class="lh-1 text-16 text-light-1">Last Name</label>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-10">
                    <div class="form-input ">
                      <input type="email" required="" maxlength="100">
                      <label class="lh-1 text-16 text-light-1">Email</label>
                    </div>
                  </div>
                  <div class="col-md-12 mb-10">
                    <div class="row">
                      <div class="col-4">
                        <div class="form-input">
                          <select name="" class="">
                            <option value="">IND (+91)</option>
                            <option value="">US (+1)</option>
                          </select>
                          <label class="lh-1 text-16 text-light-1">Country</label>
                        </div>
                      </div>
                      <div class="col-8">
                        <div class="form-input ">
                          <input type="tel" required="" maxlength="100">
                          <label class="lh-1 text-16 text-light-1">Phone Number</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 lg:d-none">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
                <div class="d-flex">
                  <img class="rounded-4 col-12 me-3" src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" style="max-width: 60px;" alt="image">   
                  <div>                  
                    <h6>{{ $package->name }}</h6>       
                    <p><i class="icon-location-pin"></i> destination locations</p>          
                  </div>            
                </div>
                <hr>                
                <p>{{ Str::limit($package->overview, 150) }}</p>
                <hr>
                <div class="text-14 text-light-1 d-flex justify-between fw-600">
                  <span>Adult</span> 
                  <span>US $ {{ $package->price->adult_amount }}</span>
                </div>
                <div class="text-14 text-light-1 d-flex justify-between fw-600">
                  <span>Children</span> 
                  <span>US $ {{ $package->price->children_amount }}</span>
                </div>              
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

@endsection