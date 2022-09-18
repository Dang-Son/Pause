<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongRelationshipController;
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

// Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);



Route::get('/upload', function () {
    return view('upload');
});

/**This is a example route we so that we can use to upload image , please update in php.ini  so that you can upload large file */
Route::post('/upload', function (Request $request) {

    if ($request->hasFile('image')) {

        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $path = storage_path() . '/uploads/';
        return $file->move($path, $filename);
    }

    return response('Upload failed', 502);
});





Route::get('/playlist/{playlist}', [PlaylistController::class, 'show']);

Route::get('playlist/{playlist}/relationships/songs', [PlaylistSongRelationshipController::class, 'index'])->name('playlist.relationships.songs');


Route::get('playlist/{playlist}/songs', function () {
    return true;
})->name('playlist.songs');
