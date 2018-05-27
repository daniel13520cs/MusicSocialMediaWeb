@extends('layouts.app')

@section('content')

@if(Auth::check()) 
    <form method="GET" action="{{ route('page', 'songs') }}">
        <select name="add">
            <option selected disabled>Choose one</option>
            @foreach ($ttitles as $key=>$ttitle)
                <option value="{{$ttitle->ttitle}}">{{$ttitle->ttitle}}</option>
            @endforeach 
        </select>
        <button type="submit" onclick="window.location='{{ url("songs") }}'">Add to Playlist</button>
    </form>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @foreach ($tids as $key=>$tid)
                        <iframe src= "{{URL::asset('https://open.spotify.com/embed?uri=spotify:track:' . $tid->tid)}}" width="320" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    @endforeach
                </body>
            </div>
        </div>
    </div>
</div>
@endsection

