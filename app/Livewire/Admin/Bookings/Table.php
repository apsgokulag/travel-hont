<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;
use Razorpay\Api\Api;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.bookings.table', ['bookings' => Booking::with('latestTransaction', 'package', 'client', 'currency')->orderBy('id', 'DESC')->paginate(10)]);
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

    public function refund(Int $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        try {

            $api = new Api( env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
            $response = $api->payment->fetch($booking->latestTransaction->ref_payment_id)->refund(
                [
                    "amount"=> $booking->latestTransaction->total * 100, 
                    "speed"=>"normal", 
                    "notes"=> ["booking_id"=> $booking->id], 
                    "receipt"=>""
                ]
            );
            if($response['status'] == 'processed'){
                $booking->latestTransaction->type = 'refund';
                $booking->latestTransaction->save();
                $this->resetPage();
                $this->dispatch('swal:block-notification', [
                    'icon' => 'success',
                    'title' => 'Refunded Successfully',
                ]);
            }
          } catch (\Exception $e) {          
            //   return $e->getMessage();
            if( $e->getMessage() == 'The payment has been fully refunded already'){
                $booking->latestTransaction->type = 'refund';
                $booking->latestTransaction->save();
                $this->resetPage();
                $this->dispatch('swal:block-notification', [
                    'icon' => 'success',
                    'title' => 'Refunded Successfully',
                ]);
            }else
                $this->dispatch('swal:block-notification', [
                    'icon' => 'error',
                    'title' => $e->getMessage(),
                ]);
          }                
    }
}
