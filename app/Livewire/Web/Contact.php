<?php

namespace App\Livewire\Web;

use App\Mail\ContactSubmitted;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Contact extends Component
{
    #[Locked]
    public $isSubmitted = false;

    public $name, $email, $subject, $message;
    public function render()
    {
        return view('livewire.web.contact');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data = [
            'name' => $this->name, 
            'email' => $this->email, 
            'subject' => $this->subject, 
            'message' => $this->message
        ];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactSubmitted($data));
        $this->isSubmitted = true;
    }
}
