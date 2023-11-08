<?php

namespace App\Livewire\Web\Packages;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Review extends Component
{
    
    #[Locked]
    public $formSubmitSuccess;

    public $firstName, $lastName, $email, $rating, $title, $comment;

    public function mount()
    {
        $this->formSubmitSuccess = false;
    }

    public function render()
    {
        return view('livewire.web.packages.review');
    }

    protected $messages = [
        'firstName.required' => 'Please type first name',
        'lastName.required' => 'Please type last name',
        'email.required' => 'Please type email',
        'email.email' => 'Please type valid email',
        'rating.required' => 'Please select desired rating',
        'title.required' => 'Please type title',
        'comment.required' => 'Please type comment',
    ];
    public function submit()
    {
        $this->validate([
            'firstName' => 'required|max:200',
            'lastName' => 'required|max:200',
            'email' => 'required|email',
            'rating' => 'required',
            'title' => 'required|max:500',
            'comment' => 'required|max:2500',
        ]);   
    }
}
