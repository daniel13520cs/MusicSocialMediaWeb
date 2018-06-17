<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Log;
use App\Follower;
use App\Users;


class PeopleController extends Controller
{
    public static function fetch($col) {
        $people = People::select($col)->take(30)->get();
        Log::debug($people);
        return $people;
        
    }

    /**
     * insert like relation in Likes
     * 
     * @return void
     */
    public function store(Request $request, $id){
        if($request->input('selectVal') == null || $id == null){
            return;
        }
        $name = $request->input('selectVal');
        $user = new Users;
        $obj = $user->getCol("id", "name", $name);
        $fid = $user->get_obj_vars_array($obj , "id"); 
        $create = Follower::firstOrCreate(
            ['follower' => $id, 'followee' => $fid ],
            ['ftime' =>  Carbon::now()]
        );
    }

    public static function getID($col){
        if($col == null){
            return null;
        }
        $id = User::select('id')->where("name", "=", $col)->get();
        return $id[0]->id;
    }

    public static function getUserCol($hasColName, $hasColVal, $wantCol){
        if($hasColVal == null){
            return null;
        }
        return User::select($wantCol)->where($hasColName, "=", $hasColVal)->get();
    }


    public static function follow($id, $selectID){
        if(($selectID != null) && !PeopleController::isExist($id, $selectID)){
            DB::table('Follow')->insert(
                ['follower' => $id, 'followee' => $selectID, 'ftime' => Carbon::now()]
            );
        }
    }

    public static function isExist($id, $selectID){
        $res = Follower::select('ftime')->where("follower", "=", $id)->where("followee", "=", $selectID)->get();
        return !$res->isEmpty();
    }

    
}
