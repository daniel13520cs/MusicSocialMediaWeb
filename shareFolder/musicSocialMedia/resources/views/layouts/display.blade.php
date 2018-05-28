@extends('layouts.app')


@section('content')
@if(Auth::check()) 
    <form method="GET" action="{{ route('page', $pageName ) }}">
        <select name="selectVal">
            <option selected disabled>Choose one</option>
            @yield('optionVals')
        </select>
        @yield('options')
    </form>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @yield('result')
                </body>
            </div>
        </div>
    </div>
</div>
@endsection