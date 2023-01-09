@extends('layouts.app')

@section('title', 'Add Photo')

@section('content')

    @include('layouts.messages')

    <div class="container">
        <form class="p-3 m-5 border border-primary" action="/photos/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('name') }}">
                <small id="helpId" class="text-muted">Enter Title for Image</small>
                @error('title')
                    <small class="alert-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('description') }}">
                <small id="helpId" class="text-muted">Enter Description For the Image</small>
                @error('description')
                    <small class="alert-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Image to be added</small>
                @error('image')
                    <small class="alert-danger">{{$message}}</small>
                @enderror
            </div>

            <input type="hidden" name="album_id" value="{{$album_id}}">

            <button type="submit" class="btn btn-outline-primary btn-large">Upload Image</button>

        </form>
    </div>




@endsection
