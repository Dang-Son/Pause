<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    public function index()
    {
        $listSongs = Song::all();

        return $listSongs;
    }

    public function show(Song $song)
    {
        return $song;
    }

    public function store(Request $request)
    {
        $song = Song::create([
            'name' => $request->input('name'),
            'liked' => $request->input('liked'),
            'views' => $request->input('views'),
            'category' => $request->input('category'),
        ]);
        return $song;
    }

    public function update(Request $request, Song $song)
    {
        $song->update(['name' => $request->input('name'), 'category' => $request->input('category'), 'liked' => $request->input('liked'), 'views' => $request->input('views')]);
        return $song;
    }

    public function delete(Song $song)
    {
        $song->delete();
        return response(null, 204);
    }
}
