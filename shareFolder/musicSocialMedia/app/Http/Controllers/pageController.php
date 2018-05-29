<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Artist;




class pageController extends Controller
{

    private $id;
    public $artist;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->artist = new Artist;
        $this->like = new LikeController;
    }

    /**
     * select web pages 
     * 
     * @return view
     */
    public function page(Request $request, $pageName='home'){
        $result = view($pageName);
        $data = null;
        switch($pageName){
            case 'songs':
                $tids = SongController::fetch("tid");
                $ttitles = SongController::fetch("ttitle");
                $result = view($pageName)->with('tids', $tids)->with('ttitles', $ttitles)->with('pageName', 'songs');
                $selectTid = $request->input('selectVal');
                $this->addToPlayList($selectTid);
                break;
            case 'albums':
                $data = AlbumController::fetch();
                $result = view($pageName)->with('alids', $data);
                break;
            case 'artists':
                $aids = $this->artist->fetch("aid", 10);
                $anames = $this->artist->fetch("aname", 10);
                $result = view($pageName)->with('anames', $anames)->with("aids", $aids)->with('pageName', 'artists');
                //like the artist
                Log::debug($this->id);
                $this->like->store($request, Auth::id()) ;
                break;
            case 'people':
                $data = PeopleController::fetch('name');
                $result = view($pageName)->with('names', $data)->with('pageName', 'people');
                //follow the person
                $selectID = PeopleController::getID($request->input('selectVal'));
                PeopleController::follow(Auth::id(),$selectID);

                break;
            case 'playlists':
                if(Auth::check()){
                    if(!PlayListController::isPlaylistExist( Auth::id() ) ) {
                        PlayListController::createPlayList(Auth::id(), Auth::id());
                    }
                    $data = PlayListController::fetch();
                }
                $result = view($pageName)->with('tids', $data);
                break;
            case 'followers':
                if(Auth::guest()){
                    break;
                }
                $data = FollowerController::fetch(Auth::id());
                $result = view($pageName)->with('followers', $data);
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