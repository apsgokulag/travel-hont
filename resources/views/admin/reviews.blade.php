@extends('admin.layout.app')

@section('content')
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">

      <h1 class="text-30 lh-14 fw-600">Reviews</h1>

    </div>

    <div class="col-auto">

    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="overflow-scroll scroll-bar-1">
      <div>
        <table class="table-3 -border-bottom col-12">
          <thead class="bg-light-2">
            <tr>
              <th>Client Details</th>
              <th>Package</th>
              <th>Title</th>
              <th>Text</th>
              <th>Rating</th>           
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookings as $booking)                
              <tr>
                <td>
                    {{ $booking->client->name }}
                    <br> <i class="icon-email-2"></i> <a href="mailto:{{ $booking->client->email }}">{{ $booking->client->email }}</a>
                    @if ($booking->client->phone)
                        <br> <i class="icon-bell-ring"></i> <a href="tel:{{ $booking->client->phone }}">{{ $booking->client->phone }}</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.packages.edit', ['slug' => $booking->package->slug]) }}" class="text-blue-1">{{ $booking->package->name }}</a>
                </td>
                <td>
                    Booked {{ $booking->start_date == $booking->end_date?' on '.date('d-F, Y', strtotime( $booking->start_date)):' from '.date('d-F, Y', strtotime( $booking->start_date)).' to '.date('d-F, Y', strtotime( $booking->end_date)) }}
                    <br>{{ '( '.$booking->days.' Days )' }}
                </td>
                <td>
                    Adults Nos. : {{ $booking->adult_count }}
                    @if ($booking->children_count)
                        <br> Children Nos. : {{ $booking->children_count }}
                    @endif
                </td>
                <td>{{ $booking->total.' '.$booking->currency->code }}</td>
                <td>
                    @if ($booking->latestTransaction->type == 'capture' && $booking->latestTransaction->success)
                        <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-green-2 text-green-1">Credited</span>                        
                    @elseif($booking->latestTransaction->type == 'refund')
                        <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3">Refunded</span>                        
                    @endif
                </td>
              </tr>          
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection