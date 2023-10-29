<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Images extends Component
{
    public Package $package;
    public $images;

    public function mount(){
        $this->getAllPackageImages();
    }
    public function render()
    {
        return view('livewire.admin.packages.images');
    }
    public function getAllPackageImages(){
        $this->images = $this->package->getMedia();
    }
    public function delete(Int $imageId)
    {
        
        DB::transaction(function () use ($imageId) {
            $this->package->deleteMedia($imageId); 
            $this->package->refresh();           
            $this->getAllPackageImages();
            $this->dispatch('swal:block-notification', [
                'icon' => 'success',
                'title' => 'Image deleted successfully',
            ]);
        });    
    }
}
