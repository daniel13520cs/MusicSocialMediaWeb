<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;


class FollowerController extends Controller
{
    public static function fetch($id) {
        $followers = Follower::select('follower')->where('followee', '=', $id)->get();
        return $followers;
    }
}
