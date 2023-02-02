<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongResource;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    //Search song
    public function index(Request $request)
    {
        $search = Song::orderBy('views')->where('name', 'LIKE', '%' . $request->input('name') . '%')->get();
        return SongResource::collection($search);
    }
}
