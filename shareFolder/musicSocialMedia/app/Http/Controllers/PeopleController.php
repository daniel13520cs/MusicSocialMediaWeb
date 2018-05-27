<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Log;

class PeopleController extends Controller
{
    public static function fetch($col) {
        $people = People::select($col)->take(30)->get();
        return $people;
        
    }

    public static function getID($col){
        if($col == null){
            return null;
        }
        $id = User::select('id')->where("name", "=", $col)->get();
        return $id[0]->id;
    }

    public static function follow($selectID, $id){
        if($selectID != null){
            DB::table('Follow')->insert(
                ['follower' => $selectID, 'followee' => $id, 'ftime' => Carbon::now()]
            );
        }
    }

    
}
