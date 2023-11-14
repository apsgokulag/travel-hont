<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Illuminate\Support\Facades\App;
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
    public function downloadInvoice($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $data = ['booking' => $booking];
        $fileName = config('app.name').'-invoice.pdf';
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('invoice.booking-success', $data)
        ->setPaper('a4')
        ->setOption('viewport-size', '1280x1024')
        ->setOption('enable-smart-shrinking', true)
        ->setOption('footer-left', config('app.name'))
        ->setOption('footer-right', '[page] / [toPage]')
        ->setOption('page-offset',0)
        ->setOption('footer-font-size', 6)
        ->setOption('encoding', "UTF-8")
        ->setOption('no-background', true)
        ->setOption('orientation', 'portrait'); 
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->output();
        }, $fileName);
    }
}
