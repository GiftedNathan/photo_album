@extends('layouts.app')

@section('content')
    @include('layouts.messages')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-1"></div>
        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-left">{{$photo->title}}</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$photo->description}}</h5>
                    <p>Created on {{$photo->created_at}} </p>
                    <hr>
                    <div>
                        <img src="/storage/photos/{{$photo->album_id}}/{{$photo->image}}" alt="{{$photo->image}}" class="img-fluid img-thumbnail" style="width: ;">
                    </div>
                    <hr>
                    <P><small class="text-muted">Size: {{$photo->size}}</small></P>
                    <div class="d-flex justify-content-start">

                        <a href="/albums/{{$photo->album_id}}" class="btn btn-dark mr-3">Back</a>
                        <a href="/photos/{{$photo->id}}/edit" class="btn btn-primary mr-2">Edit Photo</a>
                        <form class=""  action="/photos/{{$photo->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Photo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-1"></div>
    </div>

@endsection
