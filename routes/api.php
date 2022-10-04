<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongPlaylistRelatedController;
use App\Http\Controllers\SongPlaylistRelationshipsController;
use App\Http\Resources\SongResource as SongResource;
use App\Models\Authors;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/song', [SongsController::class, 'index']);

Route::get('/song/{song}', [SongsController::class, 'show']);

Route::post('/song', [SongsController::class, 'store']);

Route::patch('/song/{song}', [SongsController::class, 'update']);

Route::delete('/song/{song}', [SongsController::class, 'delete']);



Route::get('/artist', [ArtistController::class, 'index']);

Route::get('/artist/{artist}', [ArtistController::class, 'show']);

Route::post('/artist', [ArtistController::class, 'store']);

Route::patch('/artist/{artist}', [ArtistController::class, 'update']);

// Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);

// playlist
Route::get('/playlist', [PlaylistController::class, 'index']);

// get only relationship
Route::get('song/{song}/relationships/playlist',  [SongPlaylistRelationshipsController::class, 'index'])->name('song.relationships.playlist');

// update relationship
Route::patch('song/{song}/relationships/playlist',  [SongPlaylistRelationshipsController::class, 'update'])->name('song.relationships.playlist');



// related
Route::get('song/{song}/playlist', [SongPlaylistRelatedController::class, 'index'])->name('song.playlist');
