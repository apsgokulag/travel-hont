<?php

namespace App\Livewire\Forms\admin;

use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PackageForm extends Form
{
    public ?Package $package;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $overview;

    #[Rule('required')]
    public $description;

    #[Rule(['form.images.*' => 'nullable|sometimes|image'])]
    public $images = [];

    public $uploadedImages = [];

    protected $messages = [
        'name.required' => 'Please type package :attribute',
        'overview.required' => 'Please type :attribute',
        'description.required' => 'Please type :attribute',
        'images.*.image' => 'Please upload valid image',
    ];

    public function setPackage(Package $package)
    {
        $this->package = $package;
        $this->fill([            
            'name' => $package->name,
            'overview' => $package->overview,
            'description' => $package->description,
            'uploadedImages' => $package->getMedia(),
        ]);
    }

    public function store()
    {
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
        }) ;
    }

    public function update(){
        DB::transaction( function (){
            $this->package->update([
                'name' => $this->name,
                'overview' => $this->overview,
                'description' => $this->description, 
            ]);           
            if($this->images)
                foreach ($this->images as $key => $image) {
                    $this->package->addMedia($image)->toMediaCollection();
                }
            session()->flash('success', 'Package successfully updated.');
        });
    }
}
