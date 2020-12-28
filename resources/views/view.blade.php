@extends('layouts.app')

@section('content')
<div class="container w-100">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <div class="pb-4" style="display:flex;justify-content:space-between">
              <h2>Folder: {{ $folder->name }}</h2>
              <a type="submit" class="btn btn-primary btn-lg" href="/folders">Back</a>
            </div>

            {{-- START OF MAIN TABLE --}} 
            <div class="card-group">
                @foreach($folder->images as $image)
                <!--bootstrap card with 3 horizontal images-->
                    <div class="card-block col-md-4 mt-3" style="text-align: center;"> 
                        <a data-fancybox="gallery" class="postImg" href="{{ env('AWS_S3_URL').$image->path }}"><img class="postImg"  style="max-width:100%;max-height:100%;margin:10px" src="{{ env('AWS_S3_URL').$image->path }}"></a>
                        {{-- <img class="card-img-top" height="500" src= "{{ env('AWS_S3_URL').$image->path }}">  --}}
                        <div class="card-body"> 
                            <h3 class="card-title">{{ $image->filename }}</h3>
                        </div> 
                    </div>
                @endforeach
                </div> 
            {{-- END OF MAIN TABLE --}}
        </div>
    </div>
</div>
@endsection