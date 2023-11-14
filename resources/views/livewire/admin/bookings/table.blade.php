<div>
    <table class="table-3 -border-bottom col-12">
        <thead class="bg-light-2">
          <tr>
            <th>Client Details</th>
            <th>Package</th>
            <th>Booking Details</th>
            <th>Traveller Details</th>
            <th>Paid Amount</th>
            <th>Status</th>
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
                    <td>
                        @if ($booking->latestTransaction->type == 'capture' && $booking->latestTransaction->success)
                            <div
                                x-data="{
                                    show : false,
                                    bookingId : {{ $booking->id }},
                                    downloadInvoice(){
                                        this.show = true;
                                        $wire.downloadInvoice(this.bookingId).then(result => { this.show = false });
                                    }
                                }">                             
                                <a href="" @click.prevent="downloadInvoice()" ><i class="icon-newsletter"></i> Invoice</a>                            
                                <span x-show="show" x-cloak>
                                    <span class="loader"></span>
                                </span>
                            </div>
                        @endif
                    </td>
                </tr>          
            @endforeach
        </tbody>
      </table>
</div>

@push('styles')
    <style>
        .loader {
            width: 10px;
            height: 10px;
            border: 2px solid #000000;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
            }

            @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        } 
    </style>
@endpush