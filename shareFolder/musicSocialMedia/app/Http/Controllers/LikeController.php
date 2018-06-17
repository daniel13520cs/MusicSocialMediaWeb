<?php

namespace App\Http\Controllers;

use App\Like;
use App\Artist;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{
    
    /**
     * insert like relation in Likes
     * 
     * @return void
     */
    public function store(Request $request, $id){
        if($request->input('selectVal') == null || $id == null){ 
            return;
        }
        $artist = new Artist;
        $aname = $request->input('selectVal');
        $aid = $artist->getCol("aid", "aname", $aname);
        $aid = $artist->get_obj_vars_array($artist->getCol("aid", "aname", $aname) , "aid"); 
        $check = Like::firstOrCreate(
            ['id' => $id, 'aid' => $aid], 
            ['ltime'=> Carbon::now()]
        );
    }
    

}

