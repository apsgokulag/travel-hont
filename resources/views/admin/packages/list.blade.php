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
            <table class="table-4 -border-bottom col-12">
              <thead class="bg-light-2">
                <tr>                 
                  <th>Name</th>
                  <th>Reviews</th>
                  <th>Bookings</th>                
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>                 
                  <td>
                    <a href="" class="fw-500">
                      Crowne Plaza Hotel
                    </a>
                    <span class="d-block text-12 mt-2 text-muted">Created on 12-Jun-2023</span>
                  </td>                  
                  <td>
                    <div class="rounded-4 size-35 bg-blue-1 text-white flex-center text-12 fw-600">4.8</div>
                  </td>
                  <td>
                    <a href="">12 Bookings</a>
                  </td>
                  <td><span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-green-1 text-green-2">Published</span></td>
                  <td>
                    <div class="row x-gap-10 y-gap-10 items-center">                      

                      <div class="col-auto">
                        <a href="db-vendor-add-hotel.html?packageId=6&type=edit" class="flex-center bg-light-2 rounded-4 size-35">
                          <i class="icon-edit text-16 text-light-1"></i>
                        </a>
                      </div>

                      <div class="col-auto">
                        <a href="#" class="flex-center bg-light-2 rounded-4 size-35">
                          <i class="icon-trash-2 text-16 text-light-1"></i>
                        </a>
                      </div>

                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

  </div>

@endsection