<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlayList;

class PlayListController extends Controller
{
    public static function fetch() {
        $userPlaylists = PlayList::select('pid')->take(10)->get();
        return $userPlaylists;
    }


    public static function createPlayList($id, $pid){
        PlayList::insert(
            ['pid' => 'john@example.com', 'ptitle' => 0, 'pdate' => 'john@example.com', 'id' => 0, 'status' => 'john@example.com']
        );
    }
    
}
