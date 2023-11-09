@extends('admin.layout.app')

@section('content')
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">

      <h1 class="text-30 lh-14 fw-600">Pending Reviews</h1>

    </div>

    <div class="col-auto">

    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="overflow-scroll scroll-bar-1">
      <div>
        @livewire('admin.pending-reviews')
      </div>
    </div>
  </div>

@endsection