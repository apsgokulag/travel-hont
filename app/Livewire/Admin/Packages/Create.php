<?php

namespace App\Livewire\Admin\Packages;

use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $overview;

    #[Rule('required')]
    public $description;

    public $images = [];

    protected $messages = [
        'name.required' => 'Please type package :attribute',
        'overview.required' => 'Please type :attribute',
        'description.required' => 'Please type :attribute',
    ];

    public function render()
    {
        return view('livewire.admin.packages.create');
    }

    public function submit()
    {
        $this->validate();
        DB::transaction( function (){
            $package = Package::create([
                'name' => $this->name,
                'overview' => $this->overview,
                'description' => $this->description,   
                'status' => 'published',
            ]);
            if($this->images)
                foreach ($this->images as $key => $image) {
                    $package->addMedia($image)->toMediaCollection();
                }
            session()->flash('success', 'Package successfully created.');
            $this->redirect(route('admin.packages.list'));
        }) ;
    }
}
