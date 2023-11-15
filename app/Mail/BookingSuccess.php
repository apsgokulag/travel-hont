<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class BookingSuccess extends Mailable
{
    use Queueable, SerializesModels;
    private $pdf;
    /**
     * Create a new message instance.
     */
    public function __construct(public Booking $booking)
    {
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
        $this->pdf = $pdf->output();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Success',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->pdf, 'Invoice.pdf')
            ->withMime('application/pdf'),
        ];
    }
}
