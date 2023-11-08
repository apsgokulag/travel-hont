@extends('admin.layout.app')

@section('content')
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">

      <h1 class="text-30 lh-14 fw-600">Clients</h1>

    </div>

    <div class="col-auto">

    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="overflow-scroll scroll-bar-1">
        <table class="table-3 -border-bottom col-12">
            <thead class="bg-light-2">
              <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Bookings</th>
                <th>Reviews</th>              
              </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)                
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>
                            <i class="icon-email-2"></i> <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                            @if ($client->phone)
                                <br> <i class="icon-bell-ring"></i> <a href="tel:{{ $client->phone }}">{{ $client->phone }}</a>
                            @endif
                        </td>
                        <td>{{ $client->bookings_count }}</td>                        
                        <td></td>                       
                    </tr>          
                @endforeach
            </tbody>
          </table>
    </div>
  </div>

@endsection