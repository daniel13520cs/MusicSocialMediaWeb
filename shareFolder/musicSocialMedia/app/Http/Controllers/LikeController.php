<?php

namespace App\Http\Controllers;

use App\Like;
use App\Artist;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    
    public function store(Request $request, $id){
        $like = new Like;
        $artist = new Artist;
        $like->id = $id;
        $aname = $request->input('selectVal');
        Log::debug($aname);
        $like->aid = $artist->getPCol("aid", "aname", $aname);
        $like->ltime = Carbon::now();
        if($like->aid != null && $like->id != null){
            Like::firstOrCreate(
                ['id' => $like->id], ['aid' => $like->aid], ['ltime', $like->ltime]
            );
        }
    }
    
}
