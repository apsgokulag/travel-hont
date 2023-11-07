<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Table extends Component
{
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::with('latestTransaction', 'package', 'client', 'currency')->orderBy('id', 'DESC')->get();
    }
    public function render()
    {
        return view('livewire.admin.bookings.table');
    }
}
