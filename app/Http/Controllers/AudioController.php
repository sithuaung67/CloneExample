<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use App\Audio;
use App\Category;
use App\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
    public function getNewMusic(){
        $mus=Audio::all();
        $cat=Category::all();
        $art=Artist::all();
        $alb=Album::all();
        return view('audio')->with(['mus'=>$mus])->with(['cat'=>$cat])->with(['art'=>$art])->with(['alb'=>$alb]);

    }
    public function postNewMusic(Request $request){
        $music_name=date("d-m-y-h-i-s").'.'.$request->file('music_name')->getClientOriginalExtension();
        $music_file=$request->file('music_name');

        $mus=new Audio();
        $mus->song_name=$request['song_name'];
        $mus->artist_id=$request['artist_id'];
        $mus->album_id=$request['album_id'];
        $mus->category_id=$request['category_id'];
        $mus->audio=$music_name;
        $mus->Save();
        Storage::disk('audio')->put($music_name, File::get($music_file));
        return redirect()->back();
    }
    public function getEditArtist($id){
        $art=Artist::whereId($id)->FirstOrFail();
        return view('editArtist')->with(['art'=>$art]);
    }
    public function postEditArtist(Request $request){
        $id=$request['id'];
        $art=Artist::whereId($id)->FirstOrFail();
        $art->artist_name=$request['artist_name'];
        $art->update();
        return redirect()->route('getArtist')->with('info', 'Edit Album successful');
    }
    public function getEditAudio($id){
        $aud=Audio::whereId($id)->FirstOrFail();
        $art=Artist::whereId($id)->FirstOrFail();
        $abl=Album::whereId($id)->FirstOrFail();
        $cat=Category::whereId($id)->FirstOrFail();
        $son=Song::whereId($id)->FirstOrFail();
        return view('editAudio')->with(['aud'=>$aud])->with(['art'=>$art])->with(['abl'=>$abl])->with(['cat'=>$cat])->with(['son'=>$son]);
    }
    public function postEditAudio(Request $request){
        $id=$request['id'];
        $art=Audio::whereId($id)->FirstOrFail();
        $art->artist_name=$request['artist_name'];
        $art->update();
        return redirect()->route('getArtist')->with('info', 'Edit Album successful');
    }
}

