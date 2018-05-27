@extends('layouts.app')

@section('content')

@if(Auth::check()) 
    <form method="GET" action="{{ route('page', 'people') }}">
        <select name="follow">
            <option selected disabled>Choose one</option>
            @foreach ($names as $key=>$name)
                <option value="{{$name->name}}">{{$name->name}}</option>
            @endforeach 
        </select>
        <button type="submit" >Follow</button>
    </form>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @foreach ($names as $key=>$name)
                         <p>{{ $name->name }}</p>
                    @endforeach
                </body>
            </div>
        </div>
    </div>
</div>
@endsection
