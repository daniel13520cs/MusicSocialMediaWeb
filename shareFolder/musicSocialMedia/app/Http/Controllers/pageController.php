<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Artist;
use App\Song;
use App\Playlist;
use App\PlaylistTrack;




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
        $this->songCtl = new SongController(new Song);
        $this->artist = new  Artist;
        $this->likeCtl = new LikeController;
        $this->peopleCtl = new PeopleController; 
        $this->playlistCtl = new PlaylistController(new PlayList);
        $this->dbCtl = new DBController; 
        $this->socialCtl = new SocialController;
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
                //check if the user has the playlsit already
                $tids = SongController::fetch("tid");
                $ttitles = SongController::fetch("ttitle");
                $result = view($pageName)->with('tids', $tids)->with('ttitles', $ttitles)->with('pageName', 'songs');
                $selectTid = $request->input('selectVal');
                //create playlsit if it does not exist 
                if(!$this->playlistCtl->isPlaylistExist( Auth::id() ) ) {
                    $this->playlistCtl->createPlaylist($request, Auth::id());
                }
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
                $this->likeCtl->store($request, Auth::id());
                break;
            case 'people':
                $data = PeopleController::fetch('name');
                $result = view($pageName)->with('names', $data)->with('pageName', 'people');
                //follow the person
                $this->peopleCtl->store($request, Auth::id());
                break;
            case 'playlists':
                $data = $this->playlistCtl->getPlaylistTracks(Auth::id());
                //add to playlist
                //$this->songCtl->store($request, Auth::id());
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
                $activities = $this->socialCtl->fetchActivity(Auth::id());
                $result = view($pageName)->with('activities', $activities);
        }
        return $result;
    }

    public function addToPlayList($tid=null){
        //check 
        //add the user selected track into the user's playlist 
        if($tid != null){
            SongController::storeToPlayList($tid);
        }
    }



    public function index($pageName='home', $controller){
        if($controller == null || $column == null){
            return view($pageName);
        }
        $data = $controller::fetch(); 
        $result = view($pageName)->with($column, $data);
        

    }

    
    
}