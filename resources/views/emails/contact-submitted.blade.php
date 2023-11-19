@extends('emails.layout.app')

@section('content')
    <h1 class="h-custom" align="left">Contact form submitted</h1>
    <p class="p-custom"> Name : {{ $data['name'] }}</p>   
    <p class="p-custom"> Email : {{ $data['email'] }}</p>   
    <p class="p-custom"> Subject : {{ $data['subject']}}</p>   
    <p class="p-custom"> Message : {{ $data['message'] }}</p>   
@endsection