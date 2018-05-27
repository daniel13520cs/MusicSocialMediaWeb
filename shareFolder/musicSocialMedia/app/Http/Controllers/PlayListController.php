<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\PlayList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;



class PlayListController extends Controller
{
    public static function fetch() {
        $userPlaylist = null;
        if(Auth::check()){
            $pid = PlayListController::getPid(Auth::id());
            $userPlaylist = DB::select('select tid from PlaylistTrack where pid = :pid', ['pid' => $pid]);
        }
        return $userPlaylist;
    }


    public static function isPlaylistExist($id){
        $pid = PlayListController::getPid($id);
        Log::debug($pid);
        return !empty($pid);
    }

    public static function createPlayList($id, $pid){
        $user = Auth::user();
        PlayList::insert(
            ['pid' => $user->id, 'ptitle' => $user->name, 'pdate' => Carbon::now(), 'id' => $user->id, 'status' => 'created']
        );
        DB::insert('insert into UserPlaylist (id, pid) values (?,?)', [$user->id, $user->id] );
    }

    public static function getPid($id){
        $pid = [];
        $pidObj = DB::select('select pid from UserPlaylist where id = :id', ['id' => $id]);
        Log::debug($pidObj);
        if($pidObj == null){
            return $pid;
        }
        $pid = get_object_vars($pidObj[0]);
        return $pid['pid'];
    }
    
}
