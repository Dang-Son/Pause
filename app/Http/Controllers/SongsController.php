<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function index(){
        $listSongs = Song::all();

        return $listSongs;
    }
    
    public function show(Song $song){
        return $song;
    }

    public function store(Request $request){
        $song = Song::create([
            'name_song' => $request->input('name_song'),
            'author' => $request->input('author'),
            'liked' => $request->input('liked'),
            'views' => $request->input('views'),
            'category' => $request->input('category'),
        ]);
        return $song;
    }

    public function update(Request $request, Song $song){
       $song->update(['name_song'=>$request->input('name_song'), 'author'=>$request->input('author'), 'category'=>$request->input('category')]);
       return $song;
    }

    public function delete(Song $song){
        $delete = Song::find($song)->delete();
        return $delete;
    }

}
