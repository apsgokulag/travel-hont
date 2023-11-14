<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


    <head>

    <title>{{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&amp;display=swap" rel="stylesheet">    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ URL::asset('css/vendors.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css" media="all">

    <style>
        .text-capitalize{
        text-transform: capitalize;
        }
    </style>

    @stack('styles')

    </head>

    <body data-barba="wrapper">

        @yield('content')
        
    </body>
</html>