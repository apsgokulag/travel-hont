<?php

namespace App\Livewire\Admin\Destinations;

use App\Models\Destination;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Images extends Component
{    
    public ?Destination $destination;
    public $destinationId;
    public $images;

    public function mount(){
        $this->getAllDestinationImages();
    }
    public function render()
    {
        return view('livewire.admin.destinations.images');
    }

    public function getAllDestinationImages(){
        if($this->destinationId)        
        {
            $this->destination = Destination::find($this->destinationId);
            $this->images = $this->destination->getMedia();
        }else{
            $this->images = [];
        }
    }
    public function delete(Int $imageId)
    {        
        DB::transaction(function () use ($imageId) {
            $this->destination->deleteMedia($imageId); 
            $this->destination->refresh();           
            $this->getAllDestinationImages();
            $this->dispatch('swal:block-notification', [
                'icon' => 'success',
                'title' => 'Image deleted successfully',
            ]);
        });    
    }
}
