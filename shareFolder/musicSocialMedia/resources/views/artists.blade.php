@extends('layouts.display')



@section('optionVals')
@foreach ($anames as $key=>$aname)
    <option value="{{$aname->aname}}">{{$aname->aname}}</option>
@endforeach 
@endsection

@section('options')
<button type="like" >Like</button>
@endsection

@section('result')
@foreach ($aids as $key=>$aid)
    <iframe src= "{{URL::asset('https://open.spotify.com/embed?uri=spotify:artist:' . $aid->aid)}}" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
@endforeach
@endsection

