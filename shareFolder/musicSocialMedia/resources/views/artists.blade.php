@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @foreach ($aids as $key=>$aid)
                        <iframe src= "{{URL::asset('https://open.spotify.com/embed?uri=spotify:artist:' . $aid->aid)}}" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    @endforeach
                </body>
            </div>
        </div>
    </div>
</div>
@endsection
