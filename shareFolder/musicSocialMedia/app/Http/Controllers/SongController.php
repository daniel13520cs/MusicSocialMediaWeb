<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;




use App\Song;

class SongController extends Controller
{
    
    public static function fetch($col) {
        $res = Song::select($col)->take(10)->get();
        return $res;
    }

    public static function storeToPlayList($ttitle){
        //the uer can only have one playlist
        $id = Auth::id();
        $pidObj = DB::select('select pid from UserPlaylist where id = :id', ['id' => $id]);
        $tidObj = DB::select('select tid from Track where ttitle = :ttitle', ['ttitle' => $ttitle]);
        $pids = get_object_vars($pidObj[0]);
        $tids = get_object_vars($tidObj[0]);
        Log::debug($pids['pid']);
        Log::debug($tids['tid']);

        //bug:still need to check if the song is already exists in the playlist 
        DB::insert('insert into  PlaylistTrack (pid, tid, ptorder) values (?, ?, ?)' , [$pids['pid'], $tids['tid'], 1]);
    }


    


}
