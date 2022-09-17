<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listArtists = Artist::all();


        return $listArtists;
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
        $artist = Artist::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return $artist;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return $artist;
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
        $artist->update(['name' => $request->input('name'), 'email' => $request->input('email')]);
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


    public function upload_image(Request $request)
    {

        $resizedImage = cloudinary()->upload($request->file('image')->getRealPath(), [
            'folder' => 'uploads',
            'transformation' => [
                'width' => 100,
                'height' => 100
            ]
        ])->getSecurePath();

        dd($resizedImage);
    }
}
