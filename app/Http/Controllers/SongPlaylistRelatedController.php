<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlaylistResource;
use App\Models\Song;
use Illuminate\Http\Request;

class SongPlaylistRelatedController extends Controller
{
    //
    public function index(Song $song)
    {
        return PlaylistResource::collection($song->playlists);
    }
}
