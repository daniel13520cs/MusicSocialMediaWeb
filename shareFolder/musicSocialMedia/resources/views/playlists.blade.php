@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @if (Auth::check())
                        @foreach ($tids as $key=>$tid)
                            <iframe src= "{{URL::asset('https://open.spotify.com/embed?uri=spotify:track:' . $tid->tid)}}" width="320" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                        @endforeach
                    @else
                        Please login to create a playlist
                    @endif
                </body>
            </div>
        </div>
    </div>
</div>
@endsection
