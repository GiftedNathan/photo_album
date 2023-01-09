@extends('layouts.app')

@section('title', 'Edit Photo')

@section('content')

    @include('layouts.messages')

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-1"></div>
            <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                <form class="p-3 border border-primary" action="/photos/{{$photo->id}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $photo->title }}">
                        <small id="helpId" class="text-muted">Enter Title for Image</small>
                        @error('title')
                            <small class="alert-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $photo->description }}">
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

                    <input type="hidden" name="album_id" value="{{$photo->album_id}}">

                    <button type="submit" class="btn btn-outline-primary btn-large">Save Image</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-1"></div>




@endsection
