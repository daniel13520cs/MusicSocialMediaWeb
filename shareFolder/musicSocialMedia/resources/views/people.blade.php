@extends('layouts.display')


@section('optionVals')
    @foreach ($names as $key=>$name)
         <option value="{{$name->name}}">{{$name->name}}</option>
    @endforeach 
@endsection

 
@section('options')
<button type="submit" >Follow</button>
@endsection

@section('result')
@foreach ($names as $key=>$name)
    <p>{{ $name->name }}</p>
@endforeach
@endsection




