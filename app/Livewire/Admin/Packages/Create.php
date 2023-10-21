<?php

namespace App\Livewire\Admin\Packages;

use App\Livewire\Forms\admin\PackageForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public PackageForm $form;    

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
