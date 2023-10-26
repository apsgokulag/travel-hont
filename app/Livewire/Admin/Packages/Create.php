<?php

namespace App\Livewire\Admin\Packages;

use App\Livewire\Forms\admin\PackageForm;
use App\Models\Currency;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public PackageForm $form;    
    
    public $currencies = [];

    public function mount()
    { 
        $this->currencies = Currency::all();
    }

    public function render()
    {
        return view('livewire.admin.packages.create');
    }

    public function submit()
    {
        $this->validate();
        $this->form->store();      
        $this->redirect(route('admin.packages.list'));  
    }
}
