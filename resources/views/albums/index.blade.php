
@extends('layouts.app')

@section('title', 'Albums')

@section('content')

    @include('layouts.messages')

    <div class="card mb-3">
        <div class="card-header">
            <h2 class="text-left">{{config('app.name')}}</h2>
        </div>
        <div class="card-body">
            <h5 class="card-title">Create albums and add photos to make it your own</h5>
            <a href="/albums/create" class="btn btn-primary">Create New Album</a>
        </div>

    </div>

    {{-- <div class="row mx-auto">

        @forelse ($albums as $album)
            <div class="d-flex justify-content-center ">
                <div class="card border-dark" style="height: 10rem; background-image: url('storage/album_covers/{{$album->cover_image}}'); background-size: cover; ">
                    <div class="card-header font-italic font-weight-lighter text-right">{{$album->name}}</div>

                    <div class="card-footer bg-transparent">
                        <a href="albums/{{$album->id}}" class="btn btn-dark btn-lg btn-block">Go into Album</a>
                    </div>
                </div>
            </div>

        @empty
            <p>Opp No albums yet</p>
        @endforelse

    </div> --}}
    <div class="row">

        @forelse ($albums as $album)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card border-dark mb-3" style="height: 14rem; background-image: url('/storage/album_covers/{{$album->cover_image}}'); background-size: cover; ">
                    <div class="card-header font-italic font-weight-lighter text-right">{{$album->name}}</div>

                    <div class="card-body">
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="albums/{{$album->id}}" class="btn btn-dark btn-lg btn-block">Go into Album</a>
                    </div>
                </div>
            </div>

        @empty
            <p>Opp No albums yet</p>
        @endforelse

    </div>
@endsection
