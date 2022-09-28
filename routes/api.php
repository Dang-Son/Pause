<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Resources\AritistResource;
use App\Http\Resources\CommentResource;
use App\Http\Resources\HistoryResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\SongResource;
use App\Models\Artist;
use App\Models\Song;

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

// Route::apiResource('/song', SongResource::class)->only([
//     'index', 'show', 'store', 'update', 'delete'
// ]);

// Route::get('/song', function () {
//     return new SongResource(Song::all());
// });




Route::get('/artist', [ArtistController::class, 'index']);
Route::get('/artist/{artist}', [ArtistController::class, 'show']);
Route::post('/artist', [ArtistController::class, 'store']);
Route::patch('/artist/{artist}', [ArtistController::class, 'update']);
Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);

// Route::apiResource('/artist', AritistResource::class)->only([
//     'index', 'show', 'store', 'update', 'destroy'
// ]);




Route::get('/comment', [CommentController::class, 'index']);
Route::get('/comment/{comment}', [CommentController::class, 'show']);
Route::post('/comment', [CommentController::class, 'store']);
Route::patch('/comment/{comment}', [CommentController::class, 'update']);
Route::delete('/comment/{comment}', [CommentController::class, 'destroy']);

// Route::apiResource('/comment', CommentResource::class)->only([
//     'index', 'show', 'update', 'destroy'
// ]);




Route::get('/notification', [NotificationController::class, 'index']);
Route::get('/notification/{notification}', [NotificationController::class, 'show']);
Route::post('/notification', [NotificationController::class, 'store']);
Route::patch('/notification/{notification}', [NotificationController::class, 'update']);
Route::delete('/notification/{notification}', [NotificationController::class, 'destroy']);


// Route::apiResource('/notification', NotificationResource::class)->only([
//     'index', 'show', 'store', 'update', 'destroy'
// ]);


Route::get('/history', [HistoryController::class, 'index']);
Route::get('/history/{history}', [HistoryController::class, 'show']);
// Route::post('/history', [HistoryController::class, 'store']);
Route::patch('/history/{history}', [HistoryController::class, 'update']);
Route::delete('/history/{history}', [HistoryController::class, 'destroy']);
