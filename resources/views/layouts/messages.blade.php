
{{--
@if ( count($errors) > 0 )
    @foreach ($errors->all() as $error)
        <small class="alert-danger">

            {{$error}}
        </small>
    @endforeach

@endif
 --}}


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ( session('success') )
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if ( session('error') )
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif


