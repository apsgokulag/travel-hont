<?php

namespace App\Livewire\Admin\Packages;

use App\Livewire\Forms\admin\PackageForm;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Package $package;

    public PackageForm $form;  
    

    public function mount()
    {
        $this->form->setPackage($this->package); 
    }


    public function render()
    {
        return view('livewire.admin.packages.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->form->update();
        $this->redirect(route('admin.packages.list'));
    }
}
