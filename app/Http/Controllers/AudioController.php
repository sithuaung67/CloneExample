<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Category;
use App\MusicBag;
use App\Song;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function getArtist(){
        $art=Artist::all();
        return view('artist')->with(['art'=>$art]);
    }
    public function postArtist(Request $request){
        $art=new Artist();
        $art->artist_name=$request['artist_name'];
        $art->save();
        return redirect()->back()->with('info', 'upload singer successful.');
    }
    public function getSong(){
        $son=Song::all();
        return view('song')->with(['son'=>$son]);
    }
    public function postSong(Request $request){
        $cat=new Song();
        $cat->song_name=$request['song_name'];
        $cat->save();
        return redirect()->back()->with('info', 'upload song successful.');
    }
    public function getAlbum(){
        $alb=Album::all();
        return view('album')->with(['alb'=>$alb]);
    }
    public function postAlbum(Request $request){
        $cat=new Album();
        $cat->album_name=$request['album_name'];
        $cat->save();
        return redirect()->back()->with('info', 'upload album successful.');
    }
    public function getCategory(){
        $cat=Category::all();
        return view('category')->with(['cat'=>$cat]);
    }
    public function postCategory(Request $request){
        $cat=new Category();
        $cat->category_name=$request['category_name'];
        $cat->save();
        return redirect()->back()->with('info', 'upload category successful.');
    }
    public function getMusic(){
        $mus=MusicBag::all();
        return view('Upload')->with(['mus'=>$mus]);
    }
    public function postNewMusic(Request $request){
        $music_name=date("D-M-Y-H-I-s").'.'.$request->file('music_name')->getClientOriginalExtension();
        $music_file=$request->file('music_name');

        $mus=new MusicBag();
        $mus->singer_id=$request['singer_name'];
        $mus->song_id=$request['song_name'];
        $mus->album_id=$request['album_name'];
        $mus->music=$music_name;
        $mus->category_id=$request['category_id'];
        $mus->Save();

        Storage::disk('music')->put($music_name, file::get($music_file));
        return redirect()->back();
    }
}