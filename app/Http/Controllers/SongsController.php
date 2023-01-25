<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;





class SongsController extends Controller
{
    public function index()
    {

        $songs = QueryBuilder::for(Song::class)
            ->allowedIncludes(['playlists', 'artist'])
            ->allowedSorts(['name', 'id'])
            ->jsonPaginate();
        return SongResource::collection($songs);
    }

    public function show(Song $song)
    {

        $song = QueryBuilder::for(Song::where('id', $song->id))
            ->allowedIncludes(['playlists', 'artist'])
            ->firstOrFail();
        return new SongResource($song);
    }

    public function store(Request $request)
    {
        $song = Song::create($request->input(("data.attributes")));
        return new SongResource($song);
    }

    public function update(Request $request, Song $song)
    {
        $song->update($request->input('data.attributes'));
        return new SongResource($song);
    }

    public function delete(Song $song)
    {
        $song->delete();
        return response(null, 204);
    }
}
