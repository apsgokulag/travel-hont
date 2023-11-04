<?php

namespace App\Livewire\Web\Packages;

use App\Models\Country;
use App\Models\Package;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Booking extends Component
{    
    public Package $package;

    #[Locked]
    public $step, $adultAmount, $childrenAmount, $amount, $startDate, $endDate, $countries = [];

    public $dates, $adultCount, $childrenCount;
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
    ];

    public function submit()
    {
        switch ($this->step) {
            case 1:  
                $this->validate([
                    'dates' => 'required',
                    'adultAmount' => 'min:1',
                ]);   
                $datesArray = explode(' to ',$this->dates);
                $this->startDate = $datesArray[0];
                $this->endDate = count($datesArray)==2?$datesArray[1]:$datesArray[0];
                ++$this->step;
                break;            
            default:
                # code...
                break;
        }
    }
}
