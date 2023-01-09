@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="card mb-3">
        <div class="card-header">
            <h1 class="text-left">{{$album->name}}</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$album->description}}</h5>
            <p>Created on {{$album->created_at}}</p>
            <div class="d-flex justify-content-start" >
                <a href="/albums" class="btn btn-dark mr-2">Back</a>
                <a href="/photos/create/{{$album->id}}" class="btn btn-primary mr-2">Add Photos</a>
                <a href="/albums/{{$album->id}}/edit" class="btn btn-primary mr-2">Edit Album</a>
                <form class=""  action="/albums/{{$album->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Album</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">

        @forelse ($album->photos as $photo)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card border-dark mb-3" style="height: 14rem; background-image: url('/storage/photos/{{$photo->album_id}}/{{$photo->image}}'); background-size: cover; ">
                    <div class="card-header font-italic font-weight-lighter text-right">{{$photo->title}}</div>
                    {{-- <img src="" class="card-img-top" alt="..." style="height: 18rem;"> --}}
                    <div class="card-body">
                    {{-- <h5 class="card-title">{{$album->title}}</h5> --}}
                    {{-- <p class="card-text">{{ $photo->description }}</p> --}}
                    </div>
                    <div class="card-footer bg-transparent"><a href="/photos/{{$photo->id}}" class="btn btn-dark btn-lg btn-block">{{$photo->title}}</a>
                    </div>
                </div>
            </div>

        @empty
            <p>Opp No photos yet</p>
        @endforelse
    </div>


@endsection
