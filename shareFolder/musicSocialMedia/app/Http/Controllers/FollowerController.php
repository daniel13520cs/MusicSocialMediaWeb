<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class FollowerController extends Controller
{
    public static function fetch($id) {
        $followerNames = DB::select('select name from users 
                                     where id in (select follower from Follow where followee = ?)', [$id]);
        return $followerNames;
    }
}   
