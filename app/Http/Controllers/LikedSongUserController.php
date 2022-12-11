<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongIdentifierResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LikedSongUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        Log::info($user);
        return SongIdentifierResource::collection($user->songs);
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
        $ids = $request->input("id");
        $user->songs()->sync($ids);
        return response(null, 204);
    }
}
