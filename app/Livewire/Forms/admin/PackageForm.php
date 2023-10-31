<?php

namespace App\Livewire\Forms\admin;

use App\Models\Destination;
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

    #[Rule(['form.price.currency_id' => 'required|numeric', 'form.price.adult_amount' => 'required|numeric|min:0|max:10000000', 'form.price.children_amount' => 'required|numeric|min:0|max:10000000'])]
    public $price = [];   

    public $uploadedImages = [];
    public $currencies = [];

    #[Rule(['form.destinations.*.name' => 'required|max:250', 'form.destinations.*.overview' => 'required|max:500'])]
    public $destinations = [];

    #[Rule(['form.highlights.*.highlight' => 'required|max:250'])]
    public $highlights = [];

    #[Rule(['form.faqs.*.question' => 'required|max:250', 'form.faqs.*.answer' => 'required|max:250'])]
    public $faqs = [];
    
    public function messages() 
    {
        return [
            'name.required' => 'Please type package :attribute',
            'overview.required' => 'Please type :attribute',
            'description.required' => 'Please type :attribute',
            'images.*.image' => 'Please upload valid image',
            'price.currency_id.required' => 'Please select currency',
            'price.adult_amount.required' => 'Please type amount',
            'price.adult_amount.min' => 'Please type valid amount',
            'price.children_amount.required' => 'Please type amount',
            'price.children_amount.min' => 'Please type valid amount',
            'price.children_amount.min' => 'Please type valid amount',
            'destinations.*.name.required' => 'Please type destination name',
            'destinations.*.overview.required' => 'Please type destination overview',
            'highlights.*.highlight.required' => 'Please type highlight point',
            'faqs.*.question.required' => 'Please type question',
            'faqs.*.answer.required' => 'Please type answer',
        ]; 
    }  

    public function setPackage(Package $package)
    {
        $this->package = $package;
        $this->fill([            
            'name' => $package->name,
            'overview' => $package->overview,
            'description' => $package->description,
            'price.currency_id' => $package->price?->currency_id,
            'price.adult_amount' => $package->price?->adult_amount,
            'price.children_amount' => $package->price?->children_amount,   
            'destinations' => collect($package->destinations)->map(function ($destination){
                $destination->image = null;
                return $destination;
            })->toArray(),
            'highlights' => $package->highlights->toArray(),
            'faqs' => $package->faqs->toArray(),
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
            $package->price()->create([
                'package_id' => $package->id,
                'currency_id' => $this->price['currency_id'],
                'adult_amount' => $this->price['adult_amount'],
                'children_amount' => $this->price['children_amount'],
            ]);
            $destinationIds = [];
            if($this->destinations){
                foreach ($this->destinations as $key => $destination) {                    
                    if($destination['id']){                        
                        if($destination['image']){
                            $oldDestination = Destination::find($destination['id']);
                            $oldDestination->addMedia($destination['image'])->toMediaCollection();
                        }
                        $destinationIds[] = $destination['id'];
                    }
                    else{
                        $newDestination = Destination::create([
                            'name' => $destination['name'],
                            'overview' => $destination['overview'],
                        ]);
                        if($destination['image'])
                            $newDestination->addMedia($destination['image'])->toMediaCollection();
                        $destinationIds[] = $newDestination->id;
                    }
                }
            }
            $package->destinations()->sync($destinationIds);
            $package->highlights()->delete();
            if($this->highlights){
                $package->highlights()->createMany($this->highlights);
            }
            $package->faqs()->delete();
            if($this->faqs){
                $package->faqs()->createMany($this->faqs);
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
            $this->package->price()->updateOrCreate(
                ['package_id' => $this->package->id],
                [
                    'currency_id' => $this->price['currency_id'],
                    'adult_amount' => $this->price['adult_amount'],
                    'children_amount' => $this->price['children_amount'],
                ]
            );
            $destinationIds = [];
            if($this->destinations){
                foreach ($this->destinations as $key => $destination) {                    
                    if($destination['id']){                        
                        if($destination['image']){
                            $oldDestination = Destination::find($destination['id']);
                            $oldDestination->addMedia($destination['image'])->toMediaCollection();
                        }
                        $destinationIds[] = $destination['id'];
                    }
                    else{
                        $newDestination = Destination::create([
                            'name' => $destination['name'],
                            'overview' => $destination['overview'],
                        ]);
                        if($destination['image'])
                            $newDestination->addMedia($destination['image'])->toMediaCollection();
                        $destinationIds[] = $newDestination->id;
                    }
                }
            }
            $this->package->destinations()->sync($destinationIds);
            $this->package->highlights()->delete();
            if($this->highlights){
                $this->package->highlights()->createMany($this->highlights);
            }
            $this->package->faqs()->delete();
            if($this->faqs){
                $this->package->faqs()->createMany($this->faqs);
            }
            session()->flash('success', 'Package successfully updated.');
        });
    }

    public function addDestination()
    {
        $this->destinations[] = [
            'id' => null,
            'name' => null,
            'overview' => null,
            'image' => null,
        ];        
    }

    public function addHighlight()
    {
        $this->highlights[] = ['highlight' => null];
    }

    public function addFaq()
    {
        $this->faqs[] = ['question' => null, 'answer' => null];
    }

    public function deleteFeature(String $type, Int $index)
    {
        switch ($type) {
            case 'destination':
                array_splice($this->destinations, $index, 1);
                break;
            case 'highlight':
                array_splice($this->highlights, $index, 1);
                break;
            case 'faq':
                array_splice($this->faqs, $index, 1);
                break;
            default:
                session()->flash('error', 'Invalid Feature.');
                break;
        }
    }
}
