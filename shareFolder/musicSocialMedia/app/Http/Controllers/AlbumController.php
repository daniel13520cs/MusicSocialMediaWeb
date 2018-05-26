<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public static function fetch() {
        $allAlbums = Album::select('alid')->take(10) ->get();
        return $allAlbums;
    }
}
