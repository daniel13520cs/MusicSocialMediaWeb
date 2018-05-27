<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;



class pageController extends Controller
{

    /**
     * select web pages 
     * 
     * @return view
     */
    private $id;


    public function page(Request $request, $pageName='home'){
        $result = view($pageName);
        switch($pageName){
            case 'songs':
                $tids = SongController::fetch("tid");
                $ttitles = SongController::fetch("ttitle");
                $result = view($pageName)->with('tids', $tids)->with('ttitles', $ttitles);
                $selectTid = $request->input('add');
                $this->addToPlayList($selectTid);
                break;
            case 'albums':
                $data = AlbumController::fetch();
                $result = view($pageName)->with('alids', $data);
                break;
            case 'artists':
                $data = ArtistController::fetch();
                $result = view($pageName)->with('aids', $data);
                break;
            case 'people':
                $data = PeopleController::fetch();
                $result = view($pageName)->with('names', $data);
                break;
            case 'playlists':
                $data = null;
                if(Auth::check()){
                    if(!PlayListController::isPlaylistExist( Auth::id() ) ) {
                        PlayListController::createPlayList(Auth::id(), Auth::id());
                    }
                    $data = PlayListController::fetch();
                }
                $result = view($pageName)->with('tids', $data);
                break;
            default:
                $result = view('home');
            
        }
        return $result;
    }

    public function addToPlayList($tid=null){
        //add the user selected track into the user's playlist 
        if($tid != null){
            SongController::storeToPlayList($tid);
        }
    }

    // public function pageK($pageName='home', $controller, $column){
    //     if($controller == null || $column == null){
    //         return view($pageName);
    //     }
    //     $data = $controller:: fetch();
    //     $result = view($pageName)->with($column, $data);
    //     return $result;
    // }



    
}