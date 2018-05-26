@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <body>
                    @foreach ($alids as $key=>$alid)
                        <iframe src= "{{URL::asset('https://open.spotify.com/embed?uri=spotify:album:' . $alid->alid)}}" width="300" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    @endforeach
                </body>
            </div>
        </div>
    </div>
</div>
@endsection
