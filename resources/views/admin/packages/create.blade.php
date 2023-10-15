@extends('admin.layout.app')

@section('content')
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">
      <h1 class="text-30 lh-14 fw-600">Packages</h1>
    </div>
    <div class="col-auto">
      <a href="{{ route('admin.packages.list', ['category' => 'active']) }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
        <div class="icon-arrow-left me-2"></div> All Packages
      </a>
    </div>
  </div>

  @livewire('admin.packages.create')

@endsection