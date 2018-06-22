<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public function fetchActivity($id){
        $result = DB::select('select name, aname, ltime from users natural join Likes natural join Artist where (month(curtime()) - month(ltime)) <= 1 and id in (select followee from Follow where follower = :id)
        order by ltime desc', ['id' => $id]);
        return $result;
    }
}   

