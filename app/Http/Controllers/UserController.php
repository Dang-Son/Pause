<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtistIdentifierResource;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\PlaylistIdentifierResource;
use App\Http\Resources\PlaylistResource;
use App\Http\Resources\UserResource;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Cast\String_;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = QueryBuilder::for(User::class)
            ->allowedIncludes(['artist'])
            ->allowedSorts(['name', 'email'])
            ->jsonPaginate();

        return UserResource::collection($users);
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
        $user = User::create($request->input(("data.attributes")));
        return UserResource::collection($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = QueryBuilder::for(User::where('id', $user->id))->firstOrFail();
        return new UserResource($user);
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
    public function update(Request $request, User $user)
    {
        $user->update($request->input('data.attributes'));
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return 'Xóa nguoi dung thành công';
    }



    public function get_total(User $user)
    {

        $topPlaylist = Playlist::all()->load('songs');
        $topPlaylist = PlaylistResource::collection($topPlaylist);


        // Load playlist user created
        $playlist = Playlist::all()->where('user_id', '=', $user->id);

        // Allow it to load song related 
        $playlist = $playlist->load('songs');
        $playlist = PlaylistResource::collection($playlist);


        // Load related artist 
        $artist = DB::table('followed_artists')
            ->join('artists', 'artists.id', '=', 'followed_artists.artist_id')
            ->where('followed_artists.user_id', '=', $user->id)
            ->select('artists.*')
            ->get();

        $artist = ArtistIdentifierResource::collection($artist);


        //List Top Views
        $top_rap = Playlist::orderBy('views')->where('category', '=', 'Rap')->get()->load('songs');
        $top_chill = Playlist::orderBy('views')->where('category', '=', 'Chill')->get()->load('songs');
        $top_bolero = Playlist::orderBy('views')->where('category', '=', 'Bolero')->get()->load('songs');
        $top_pop = Playlist::orderBy('views')->where('category', '=', 'Pop')->get()->load('songs');



        return [
            'data' => [

                'attributes' => [
                    'playlist' => $playlist,
                    'artist' => $artist,
                    'top_playlist' => $topPlaylist,
                    'user' => new UserResource($user),

                    'top_rap' => PlaylistResource::collection($top_rap),
                    'top_chill' => PlaylistResource::collection($top_chill),
                    'top_bolero' => PlaylistResource::collection($top_bolero),
                    'top_pop' => PlaylistResource::collection($top_pop)
                ],

            ]
        ];
    }
}
