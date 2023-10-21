@extends('admin.layout.app')

@section('content')
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">
      <h1 class="text-30 lh-14 fw-600">Packages</h1>
    </div>
    <div class="col-auto">
      <a href="{{ route('admin.packages.create') }}" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
        <div class="icon-plus me-2"></div> Create Package
      </a>
    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">    
    @if (session('success') || session('error'))
      <x-support.alert message="{{ session('success')??session('error') }}" type="{{  session('success')?'success':'error' }}"/>      
    @endif
    <div class="tabs -underline-2 js-tabs">
      <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 ">
        <div class="col-auto">
          <a href="{{ route('admin.packages.list', ['category' => 'active']) }}" class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 {{ $category == 'active'?'is-tab-el-active':'' }}">Active</a>
        </div>
        <div class="col-auto">
          <a href="{{ route('admin.packages.list', ['category' => 'draft']) }}" class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 {{ $category == 'draft'?'is-tab-el-active':'' }}">Draft</a>
        </div>
        <div class="col-auto">
          <a href="{{ route('admin.packages.list', ['category' => 'deleted']) }}" class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 {{ $category == 'deleted'?'is-tab-el-active':'' }}">Deleted</a>
        </div>        
      </div>

      <div class="tabs__content pt-30 js-tabs-content">

        <div class="tabs__pane -tab-item-1 is-tab-el-active">
          <div class="overflow-scroll scroll-bar-1">
           
            @livewire('admin.packages.table', ['category' => $category],)

          </div>
        </div>

      </div>
    </div>

  </div>

@endsection

@push('scripts')
  <script src="//unpkg.com/alpinejs" defer></script>
@endpush