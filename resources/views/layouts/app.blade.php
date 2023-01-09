<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="{{asset('js/app.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>  @yield('title')  </title>
    {{-- <title>{{ config('app.name', 'PhoTo alBum') }}</title> --}}
    {{-- <title>PhoTo alBum</title> --}}
</head>
    <body>

        @section('sidebar')
            @include('layouts.navbar')
        @show

        <div class="container">
            @yield('content')
        </div>

        @section('footer')
            @include('layouts.footer')
        @show


    </body>
</html>
