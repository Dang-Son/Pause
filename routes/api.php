<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArtistController;

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

// Route::get('/music', function(){
//     return new SongResource(Authors::finđ(4));
// });


Route::get('/artist', [ArtistController::class, 'index']);

Route::get('/artist/{artist}', [ArtistController::class, 'show']);

Route::post('/artist', [ArtistController::class, 'store']);

Route::patch('/artist/{artist}', [ArtistController::class, 'update']);

Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);



Route::delete('/sdsdsd', [ArtistController::class, 'destroy']);

