<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Audio;
use App\Category;
use App\Song;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAudio(){
        $aud=Audio::OrderBy('id','desc')->with('artist')->with('album')->with('category')->paginate('10');
        return response()->json($aud);
    }
    public function getSong(){
        $song=Song::OrderBy('id','desc')->paginate('10');
        return response()->json($song);
    }
    public function getArtist(){
        $art=Artist::OrderBy('id','desc')->paginate('10');
        return response()->json($art);
    }
    public function getAlbum(){
        $song=Album::OrderBy('id','desc')->paginate('10');
        return response()->json($song);
    }
    public function getCategory(){
        $song=Category::OrderBy('id','desc')->paginate('10');
        return response()->json($song);
    }
    public function getSearch($q){
        $aud=Audio::where('id', 'LIKE',"%$q%")
            ->orwhere('song_name', 'LIKE',"%$q%")
            ->orwhere('artist_id', 'LIKE',"%$q%")
            ->orwhere('album_id', 'LIKE',"%$q%")
            ->orwhere('category_id', 'LIKE',"%$q%")
            ->with('artist')->with('album')->with('category')
            ->get();
        return response()->json($aud);
    }
    public function getPostOne($id){
        $aud=Audio::with('artist')->with('album')->with('category')->whereId($id)->first();
        if($aud){
            return response()->json($aud);
        }else{
            return response()->json(["message"=>"This item have not found"]);
        }
    }
}
