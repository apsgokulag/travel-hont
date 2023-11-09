<?php

namespace App\Livewire\Admin;

use App\Models\Review;
use Livewire\Component;

class PendingReviews extends Component
{
    public $reviews;

    public function mount()
    {
        $this->reviews();
    }
    
    public function render()
    {
        return view('livewire.admin.pending-reviews');
    }

    public function reviews()
    {
        $this->reviews = Review::whereHas('package')->get();
    }

    public function delete(Int $reviewId)
    {
        $review = Review::find($reviewId);
        $review->delete();
        $this->reviews();
        $this->dispatch('swal:block-notification', [
            'icon' => 'success',
            'title' => 'Review deleted successfully',
        ]);
    }

    public function approve(Int $reviewId)
    {
        $review = Review::find($reviewId);
        $review->approved = true;
        $review->save();
        $this->reviews();
        $this->dispatch('swal:block-notification', [
            'icon' => 'success',
            'title' => 'Review approved successfully',
        ]);
    }
}
