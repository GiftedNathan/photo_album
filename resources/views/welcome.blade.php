@extends('layouts.app')

@section('title', 'home title' )

@section('content')
{{-- @include('layouts.carousel') --}}
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="container mt-5">
        <main role="main" class="inner cover text-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <h1 class="cover-heading display-4">{{config('app.name')}}</h1>

            <div class="jumbotron jumbotron-fluid border border-primary">
                <div class="container">
                    <h1 class="6">Welocme</h1>
                    <p class="lead">
                        {{config('app.name')}} is a simple photo album application developed
                        by Gifed Nathan during his days of humble beginning.
                        It is built with Laravel version 7.2 and Bootstrap version 4.4.
                    </p>
                    <p class="lead">
                        Use it by creating albums and adding photos to make it your own.
                    </p>
                    <hr class="my-2">
                    <p>More info</p>
                    <p class="lead">
                        <a class="btn btn-outline-primary btn-outline btn-lg" href="/albums" role="button">Let's beging here</a>
                    </p>
                </div>
            </div>

        </main>


    </div>
</div>
@endsection
