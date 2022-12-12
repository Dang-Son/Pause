<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;
use App\Http\Resources\PlaylistResource;
use App\Models\Playlist;
use Spatie\QueryBuilder\QueryBuilder;


class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // please put field that allow to sort into array list
        $playlists = QueryBuilder::for(Playlist::class)
            ->allowedIncludes(['songs'])
            ->allowedSorts(['name', 'id'])->jsonPaginate();

        return PlaylistResource::collection($playlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlaylistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlaylistRequest $request)
    {
        $playlist = Playlist::create($request->input(("data.attributes")));

        return new PlaylistResource($playlist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        $playlist = QueryBuilder::for(Playlist::where('id', $playlist->id))
            ->allowedIncludes(['songs'])
            ->firstOrFail();

        return new PlaylistResource($playlist);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlaylistRequest  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlaylistRequest $request, Playlist $playlist)
    {
        $playlist->update($request->input('data.attributes'));
        return new PlaylistResource($playlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return response(204, null);
    }
}
