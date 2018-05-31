<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\PlaylistTrack;
use App\Song;


class SongController extends DBController
{
    

    public function __construct()
    {
        $this->model = new Song;
    }

    public static function fetch($col) {
        $res = Song::select($col)->take(10)->get();
        return $res;
    }

    public function store(Request $request , $id ){
        if($request->input('selectVal') == null || $id == null){
            return;
        }
        $tid = $this->model->getPCol('tid', 'ttitle', $request->input('selectVal')); 
        PlaylistTrack::firstOrCreate(
            ['tid' => $tid], ['ttitle' => $request->input('selectVal')], ['ptorder' => 1 ]
        );
        
    }



    //for now pid = id :next
    public static function storeToPlayList($ttitle){
        $id = Auth::id();
        $pidObj = DB::select('select pid from UserPlaylist where id = :id', ['id' => $id]);
        $tidObj = DB::select('select tid from Track where ttitle = :ttitle', ['ttitle' => $ttitle]);
        $pids = get_object_vars($pidObj[0]);
        $tids = get_object_vars($tidObj[0]);
        if(!SongController::isExist($tids['tid'], $pids['pid'])){
            DB::insert('insert into  PlaylistTrack (pid, tid, ptorder) values (?, ?, ?)' , [$pids['pid'], $tids['tid'], 1]);
        }
    }

    public static function isExist($tid, $pid){
        $res = DB::table('PlaylistTrack')->select('*')->where("tid", "=", $tid)->where("pid", "=", $pid)->get();
        return !$res->isEmpty();
    }


    


}
