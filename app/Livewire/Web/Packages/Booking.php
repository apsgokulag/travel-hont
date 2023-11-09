<?php

namespace App\Livewire\Web\Packages;

use App\Mail\BookingSuccess;
use App\Models\Booking as ModelsBooking;
use App\Models\Client;
use App\Models\Country;
use App\Models\Package;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Booking extends Component
{    
    public Package $package;

    #[Locked]
    public $step, $adultAmount, $childrenAmount, $amount, $startDate, $endDate, $countries = [], $transactionSuccess, $orderId;

    public $dates, $adultCount, $childrenCount, $days = 0;
    public $firstName, $lastName, $email, $password, $phoneCountryCode, $phone;

    public function mount()
    {
        $this->countries = Country::all();
        $this->step = 1;
        $this->transactionSuccess = false;
        $this->adultCount = 1;
        $this->childrenCount = 0;
        $this->adultAmount = $this->package->price->adult_amount;
        $this->childrenAmount = $this->package->price->children_amount;
        $this->amount = ($this->adultCount*$this->adultAmount)+($this->childrenCount*$this->childrenAmount);
    }
    
    public function render()
    {
        return view('livewire.web.packages.booking');
    }

    protected $messages = [
        'dates.required' => 'Please select dates',
        'firstName.required' => 'Please type :attribute',
        'lastName.required' => 'Please type :attribute',
        'email.required' => 'Please type :attribute',
        'email.email' => 'Please type valid :attribute',
        'phoneCountryCode.required' => 'Please select country code',
        'phone.required' => 'Please type :attribute',
        'phone.phone' => 'Please valid :attribute number',
    ];
    public function editStepActivate(Int $step)
    {
        $this->step = $step;
    }
    public function submit()
    {
        switch ($this->step) {
            case 1:  
                $this->validate([
                    'dates' => 'required',
                    'adultCount' => 'min:1',
                ]);   
                $datesArray = explode(' to ',$this->dates);
                $this->startDate = new DateTime($datesArray[0]);
                $this->endDate = new DateTime(count($datesArray)==2?$datesArray[1]:$datesArray[0]);
                $interval = $this->endDate->diff($this->startDate);
                $this->days = $interval->format('%a')+1;                                
                $this->amount = (($this->adultAmount * $this->adultCount)+($this->childrenAmount * $this->childrenCount)) * $this->days;
                ++$this->step;
                break;            
            case 2:                
                $this->validate([
                    'firstName' => 'required|max:250',
                    'lastName' => 'required|max:250',
                    'email' => 'required|email',
                    'phoneCountryCode' => 'required',
                    'phone' => 'required|phone:'.$this->phoneCountryCode,
                ]);
                ++$this->step;
                break;
            default:
                # code...
                break;
        }
    }
    
    #[On('payment-success')] 
    public function paymentSuccess(String $paymentId)
    {
        $this->orderId = rand(100000, 999999);
        DB::transaction(function() use($paymentId){
            $client = Client::updateOrCreate(
                ['email' => $this->email],
                [
                    'first_name' => $this->firstName, 
                    'last_name' => $this->lastName,
                    'phone_code' => $this->phoneCountryCode,
                    'phone' => $this->phone
                ]
            );
            $booking = $client->bookings()->create([
                'package_id' => $this->package->id,
                'currency_id' => $this->package->price->currency->id,
                'start_date' => date('Y-m-d', strtotime($this->startDate->format('Y-m-d'))),
                'end_date' => date('Y-m-d', strtotime($this->endDate->format('Y-m-d'))),
                'days' => $this->days,
                'adult_amount' => $this->adultAmount,
                'adult_count' => $this->adultCount,
                'children_amount' => $this->childrenAmount,
                'children_count' => $this->childrenCount,
                'sub_total' => $this->amount,
                'total' => $this->amount,
            ]);  
            $transaction = $booking->transactions()->create([
                'order_id' => $this->orderId,
                'currency_id' => $this->package->price->currency->id,
                'ref_payment_id' => $paymentId,
                'total' => $this->amount,
                'type' => 'capture',
                'success' => true
            ]);
            Mail::to($booking->client->email)->send(new BookingSuccess($booking));
            $this->transactionSuccess = true;
        });
    }
}
