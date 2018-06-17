<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\PlaylistTrack;  
use App\UserPlaylist;


class PlayListController extends DBController
{


    public function __construct()
    {
        $this->model = new Playlist;
    }

    public function fetch(){
        return $this->playlist->fetch("pid", 10);
    }

    /**
     * insert like relation in Likes
     * 
     * @return void
     */
    public function createPlaylist(Request $request, $id){
        if($id == null){
            return;
        }
        PlayList::insert(
            ['ptitle' => "pop", 'pdate' => Carbon::now(), 'id' => Auth::id(), 'status' => 'assigned']
        );
        $pidObj = $this->model->select("pid")->where("status", "assigned")->where("id", $id)->get();
        Log::debug($pidObj);
        //$pid = Utility::get_obj_vars_array($pidObj, "pid");
        UserPlaylist::firstOrCreate(
            ['id' => $id], ['pid' => $pidObj[0]["pid"]]
        );
        //TODO: update status from assigned to created
    }


    /**
     * get the playlist tracks belong to the give user id
     * 
     * @return an array of objects
     */
    public function getPlaylistTracks($id){
        $playlistTrack = new PlaylistTrack;
        $res = DB::table($playlistTrack->table)->join('UserPlaylist', 'PlaylistTrack.pid', '=', 'UserPlaylist.pid') ->select("tid")->where("id", $id)->get();
        return $res;
    }

    /**
     * check if the user has at least one playlist 
     * 
     * @return true the playlsit exists
     */
    public function isPlaylistExist($id){
        $pid = PlayListController::getPid($id);
        return !empty($pid);
    }


    public static function getPid($id){
        $pid = [];
        $pidObj = DB::select('select pid from UserPlaylist where id = :id', ['id' => $id]);
        if($pidObj == null){
            return $pid;
        }
        $pid = get_object_vars($pidObj[0]);
        return $pid['pid'];
    }
    
}
