<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;

class ArtistController extends Controller
{
    public static function fetch() {
        $artists = Artist::select('aid')->take(10)->get();
        return $artists;
    }

    
}
