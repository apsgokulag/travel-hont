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
  
    public function addFeature(String $type)
    {
        switch ($type) {
            case 'destination':
                $this->form->addDestination();
                break;
            case 'highlight':
                    $this->form->addHighlight();
                    break;
            case 'faq':
                $this->form->addFaq();
                break;
            default:
                session()->flash('error', 'Invalid Feature.');
                break;
        }
    }
    public function deleteFeature(String $type, Int $index)
    {
        $this->form->deleteFeature($type, $index);
    }

    public function submit()
    {
        $this->validate();
        $this->form->update();
        $this->redirect(route('admin.packages.list'));
    }
}
