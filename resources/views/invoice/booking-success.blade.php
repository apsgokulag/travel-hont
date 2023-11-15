@extends('invoice.layout.app')

@section('content')
    <div class="p-1 card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5>GoTrip</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p>India</p>
                    <p>GSTIN : 32AAKCR0000G1ZY</p>
                </div>
                <div class="col d-flex justify-content-end">
                    <div>
                        <h5 class="text-right">Invoice</h5>
                        <p class="text-right">Date : {{ date('d-F, Y', strtotime($booking->created_at)) }}</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-10">
                <div class="col">
                    <p>Invoice To : </p>
                    <h5>{{ ucfirst($booking->client->name) }}</h5>
                    <p>Email : {{ obfuscateEmail($booking->client->email) }}</p>
                </div>
            </div>
            <table class="table-3 -border-bottom col-12">
                <thead class="bg-light-2">
                    <tr>
                        <th>Package</th>
                        <th class="text-right">Adults</th>
                        @if ($booking->children_count)                            
                            <th class="text-right">Children</th>
                        @endif
                        <th class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $booking->package->name }}</td>
                        <td class="text-right">{{ $booking->adult_count.' X '.$booking->adult_amount.' '.$booking->currency->code }}</td>   
                        @if ($booking->children_count)                            
                            <td class="text-right">{{ $booking->children_count.' X '.$booking->children_amount.' '.$booking->currency->code }}</td>                               
                        @endif          
                        <td class="text-right">{{ $booking->total.' '.$booking->currency->code }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-dark-3 mt-15">Thanks for your booking.</div>
    </div>
@endsection

@push('styles')
    <style>
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
        }
        .row > div {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
        }
    </style>
@endpush