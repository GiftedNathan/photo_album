@extends('layouts.app')

@section('title', 'Create Album')

@section('content')
    <h1>create new albums please</h1>

    @include('layouts.messages')

    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
        <div class="container ">
            <form class="p-3 mb-5 border border-primary" action="/albums" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('name') }}">
                <small id="helpId" class="text-muted">Enter Title for Album</small>
                @error('name')
                    <small class="alert-danger">{{$message}}</small>
                @enderror
                </div>

                <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('description') }}">
                <small id="helpId" class="text-muted">Enter Description For the Album</small>
                @error('description')
                    <small class="alert-danger">{{$message}}</small>
                @enderror
                </div>

                <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Cover Image for Album</small>
                @error('cover_image')
                    <small class="alert-danger">{{$message}}</small>
                @enderror
                </div>

                <button type="submit" class="btn btn-outline-primary btn-large">Create album</button>

            </form>
        </div>

    </div>




@endsection
