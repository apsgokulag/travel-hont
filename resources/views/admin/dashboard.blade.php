@extends('admin.layout.app')

@section('content')
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
        <div class="col-auto">

        <h1 class="text-30 lh-14 fw-600">Dashboard</h1>

        </div>
    </div>
    <div class="row y-gap-30 mb-10">

        {{-- <div class="col-xl-3 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Pending</div>
                <div class="text-26 lh-16 fw-600 mt-5">$12,800</div>
                <div class="text-15 lh-14 text-light-1 mt-5">Total pending</div>
              </div>

              <div class="col-auto">
                <img src="{{ asset('img/dashboard/icons/1.svg') }}" alt="icon">
              </div>
            </div>
          </div>
        </div> --}}

        <div class="col-xl-3 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Earnings</div>
                <div class="text-26 lh-16 fw-600 mt-5">$ {{ $totalEarnings }}</div>
                <div class="text-15 lh-14 text-light-1 mt-5">Total earnings</div>
              </div>

              <div class="col-auto">
                <img src="{{ asset('img/dashboard/icons/2.svg') }}" alt="icon">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Bookings</div>
                <div class="text-26 lh-16 fw-600 mt-5">{{ $successFulBookingCount }}</div>
                <div class="text-15 lh-14 text-light-1 mt-5">Total bookings</div>
              </div>

              <div class="col-auto">
                <img src="{{ asset('img/dashboard/icons/3.svg') }}" alt="icon">
              </div>
            </div>
          </div>
        </div>

      </div>

@endsection