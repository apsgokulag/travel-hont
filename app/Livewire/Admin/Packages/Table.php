<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Livewire\Component;

class Table extends Component
{
    public $category, $packages = [];

    public function mount($category){
        $this->category = $category;
        $this->packages = Package::all();
    }
    public function render()
    {
        return view('livewire.admin.packages.table');
    }
}
