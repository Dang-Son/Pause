<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaylistIdentifierResource;
use App\Models\Song;
use Illuminate\Http\Request;

class SongPlaylistRelationshipsController extends Controller
{
    //
    public function index(Song $song)
    {
        return PlaylistIdentifierResource::collection($song->playlists);
    }


    public function update(Request $request, Song $song)
    {
        $ids = $request->input("id");
        $song->playlists()->sync($ids);
        return response(null, 204);
    }
}
