<?php

namespace App\Http\Controllers;

use App\Like;
use App\Artist;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LikeController extends Controller
{
    
    public function store(Request $request, $id){
        $like = new Like;
        $artist = new Artist;
        $like->id = $id;
        $aname = $request->input('selectVal');
        $like->aid = $artist->getCol("aid", "aname", $aname);
        $like->ltime = Carbon::now();
        if($like->aid != null && $like->id != null){
            $like->save();
        }
    }
    
}
