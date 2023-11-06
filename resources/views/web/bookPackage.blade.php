
@extends('web.layout.app')

@section('content')

  <div class="header-margin"></div>
  <section class="layout-pt-md layout-pb-lg bg-light-2">
    <div class="container">
      <div class="row y-gap-30">                
        <div class="col-lg-8">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <div class="d-lg-none">          
              <h5>Package Information</h5>
              <div class="d-flex mb-3">
                <img class="rounded-4 col-12 me-3" src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" style="max-width: 60px;" alt="image">   
                <div>                  
                  <h6>{{ $package->name }}</h6>       
                  <p><i class="icon-location-pin"></i> destination locations</p>          
                </div>            
              </div>
            </div>
            
            @livewire('web.packages.booking', ['package' => $package], key($package->id))

          </div>
        </div>
        <div class="col-lg-4 lg:d-none">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
                <div class="d-flex">
                  <img class="rounded-4 col-12 me-3" src="{{ asset($package->getMedia()->first()->getFullUrl()) }}" style="max-width: 60px;" alt="image">   
                  <div>                  
                    <h6>{{ $package->name }}</h6>       
                    <p><i class="icon-location-pin"></i> destination locations</p>          
                  </div>            
                </div>
                <hr>                
                <p>{{ Str::limit($package->overview, 150) }}</p>
                <hr>
                <div class="text-14 text-light-1 d-flex justify-between fw-600">
                  <span>Adult</span> 
                  <span>US $ {{ $package->price->adult_amount }}</span>
                </div>
                <div class="text-14 text-light-1 d-flex justify-between fw-600">
                  <span>Children</span> 
                  <span>US $ {{ $package->price->children_amount }}</span>
                </div>              
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

@endsection