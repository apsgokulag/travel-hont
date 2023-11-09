@extends('emails.layout.app')

@section('content')
    <h1 class="h-custom" align="left">Dear, {{ ucwords($booking->client->name) }}</h1>
    <p class="p-custom">We have successfully received a payment of {{ $booking->total.' '.$booking->currency->code }} on booking the package ( {{  $booking->package->name }} ) 
        {{ $booking->days>1?(' from '.date('d-F, Y',strtotime($booking->start_date)).' to '.date('d-F, Y',strtotime($booking->end_date))): ' on '.date('d-F, Y',strtotime($booking->start_date))}}.                
    </p>
    <p>Please note the reference order id {{ '#'.$booking->latestTransaction->order_id }} for future use.</p>
    <p>Travelers : {{ $booking->adult_count.' adult'.($booking->adult_count>1?'s':'') }} {{ $booking->children_count > 1?(' & '.$booking->children_count.' children'.($booking->children_count>1?'s':'')):'' }}</p>
@endsection