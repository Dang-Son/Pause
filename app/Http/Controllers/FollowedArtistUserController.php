<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistIdentifierResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowedArtistUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user_id)
    {
        $artist = DB::table('followed_artists')
            ->join('artists', 'artists.id', '=', 'followed_artists.artist_id')
            ->where('followed_artists.user_id', '=', $user_id)
            ->select('artists.*')
            ->get();

        return ArtistIdentifierResource::collection($artist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function follow(Request $request, $user_id, $artist_id)
    {

        $follow = DB::table('followed_artists')->insertOrIgnore([
            'user_id' => $user_id,
            'artist_id' => $artist_id,
        ]);
        return $follow;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow(Request $request, $user_id, $artist_id)
    {
        DB::table('followed_artists')
            ->where('user_id', '=', $user_id)
            ->where('artist_id', '=', $artist_id)
            ->delete();
        return response(null, 204);
    }
}
