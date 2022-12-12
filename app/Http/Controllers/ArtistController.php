<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Resources\ArtistResource;
use Spatie\QueryBuilder\QueryBuilder;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listArtists = QueryBuilder::for(Artist::class)
            ->allowedIncludes(['songs', 'user'])
            ->allowedSorts(['name', 'followed'])
            ->jsonPaginate();


        // \Log::info("LOGGING EXAMPLE");


        return ArtistResource::collection($listArtists);
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
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {


        $artist = Artist::create($request->input(("data.attributes")));
        return new ArtistResource($artist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {

        $artist = QueryBuilder::for(Artist::where('id', $artist->id))
            ->allowedIncludes(['user'])
            ->firstOrFail();
        return new ArtistResource($artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist->update(
            $request->input(("data.attributes"))
        );
        return $artist;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return 'Xóa tác giả thành công';
    }
}
