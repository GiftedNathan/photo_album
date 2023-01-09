@extends('layouts.app')

@section('title', 'Edit Album')

@section('content')

    @include('layouts.messages')

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-1"></div>
            <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                <form class="p-3 border border-primary" action="/albums/{{$album->id}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $album->name }}">
                        <small id="helpId" class="text-muted">Enter Title for Album</small>
                        @error('name')
                            <small class="alert-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $album->description }}">
                        <small id="helpId" class="text-muted">Enter Description For the Image</small>
                        @error('description')
                            <small class="alert-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- <img src="/storage/photos/{{$photo->album_id}}/{{$photo->image}}" alt="{{$photo->image}}" class="img-fluid img-thumbnail" style="width: ;"> --}}
                    <div class="form-group">
                        <label for="cover_image">Image</label>
                        <input type="file" name="cover_image" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $album->cover_image }}">
                        <small id="helpId" class="text-muted">Cover Image for the Album</small>
                        @error('ccover_image')
                            <small class="alert-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <input type="hidden" name="album_id" value="{{$album->id}}">

                    <button type="submit" class="btn btn-outline-primary btn-large">Save Album</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-1"></div>




@endsection
