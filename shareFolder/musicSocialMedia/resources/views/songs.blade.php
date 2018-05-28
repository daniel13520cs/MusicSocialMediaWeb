@extends('layouts.display')


@section('optionVals')
@foreach ($ttitles as $key=>$ttitle)
    <option value="{{$ttitle->ttitle}}">{{$ttitle->ttitle}}</option>
@endforeach 
@endsection

@section('options')
<button type="submit" >Add to Playlist</button>
@endsection


@section('result')
@foreach ($tids as $key=>$tid)
     <iframe src= "{{URL::asset('https://open.spotify.com/embed?uri=spotify:track:' . $tid->tid)}}" width="320" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
@endforeach
@endsection