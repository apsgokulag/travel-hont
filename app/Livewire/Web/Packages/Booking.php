<?php

namespace App\Livewire\Web\Packages;

use App\Models\Country;
use App\Models\Package;
use DateTime;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Booking extends Component
{    
    public Package $package;

    #[Locked]
    public $step, $adultAmount, $childrenAmount, $amount, $startDate, $endDate, $countries = [], $country;

    public $dates, $adultCount, $childrenCount, $days = 0;
    public $firstName, $lastName, $email, $password, $phoneCountryId, $phone;

    public function mount()
    {
        $this->countries = Country::all();
        $this->step = 1;
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
        'phoneCountryId.required' => 'Please select country code',
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
                $this->country = collect($this->countries)->first(function($value){
                    return $value->id == $this->phoneCountryId;
                });
                $this->validate([
                    'firstName' => 'required|max:250',
                    'lastName' => 'required|max:250',
                    'email' => 'required|email',
                    'phoneCountryId' => 'required',
                    'phone' => 'required|phone:'.$this->country?->code,
                ]);
                ++$this->step;
                break;
            default:
                # code...
                break;
        }
    }
}
