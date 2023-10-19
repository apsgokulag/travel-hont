<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Livewire\Component;

class Table extends Component
{
    public $category, $packages = [];

    public function mount($category){
        $this->category = $category;
        switch ($this->category) {
            case 'active':                
                $this->packages = Package::where('status', 'published')->get();
                break; 
            case 'draft':                
                $this->packages = Package::where('status', 'draft')->get();
                break;   
            case 'deleted':                
                $this->packages = Package::onlyTrashed()->get();
                break;   
            default:
            $this->packages = collect();
                break;                    
        }        
    }
    public function render()
    {
        return view('livewire.admin.packages.table');
    }
}
