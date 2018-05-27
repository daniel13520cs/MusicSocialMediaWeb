@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @if(Auth::check())
                        @foreach ($followers as $key=>$follower)
                            <p>{{ $follower->follower }}</p>
                        @endforeach
                    @else
                        please login to see your followers
                    @endif
                </body>
            </div>
        </div>
    </div>
</div>
@endsection
