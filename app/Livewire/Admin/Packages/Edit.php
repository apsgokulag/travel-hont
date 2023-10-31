<?php

namespace App\Livewire\Admin\Packages;

use App\Livewire\Forms\admin\PackageForm;
use App\Models\Currency;
use App\Models\Package;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    
    public Package $package;

    public PackageForm $form;  

    public $currencies = [];
        
    public function mount()
    {
        $this->form->setPackage($this->package);   
        $this->currencies = Currency::all();
    }

    public function render()
    {
        return view('livewire.admin.packages.edit');
    }

    public function addDestination()
    {
        $this->form->addDestination();
    }   

    public function deleteDestination($destinationIndex)
    {
        $this->form->deleteDestination($destinationIndex);
    }

    public function addHighlight()
    {
        $this->form->addHighlight();
    }

    public function deleteHighlight($highightIndex)
    {
        $this->form->deleteHighlight($highightIndex);
    }

    public function submit()
    {
        $this->validate();
        $this->form->update();
        $this->redirect(route('admin.packages.list'));
    }
}
