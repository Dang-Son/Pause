<?php

namespace App\Http\Controllers;

use App\Http\Resources\SongResource;
use App\Models\History;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPJuice\Slopeone\Algorithm;

class RecommendationController extends Controller
{
    //
    public function get_songs(User $user)
    {


        $his_arr = History::all()->groupBy('user_id');
        // Log::info($his_arr);
        $dataset = [];

        foreach ($his_arr as $histories_each_user) {
            // Log::info($his);
            $tem_his = [];
            foreach ($histories_each_user as $his) {
                // Log::info($his);
                $tem_his[$his->song->id] = $his->views;
            }

            $dataset[] = $tem_his;
        }


        Log::info($dataset);

        $slopeone = new Algorithm();


        // Log::info($dataset2);
        // Log::info($data);
        $slopeone->update($dataset);

        Log::info(

            History::all()->random(1)->first()->song->name
        );

        $latest_history =  History::orderBy('created_at', 'desc')
            ->where(
                'user_id',
                $user->id
            )->limit(10)
            ->get();

        $new_data = [];


        foreach ($latest_history as $his) {
            $new_data[$his->song->id] = $his->views;
        }
        Log::info($new_data);

        $results =  $slopeone->predict($new_data);
        arsort($results);


        $results = array_slice($results, 0, 10, true);


        $listSongs = [];
        foreach ($results as $key => $value) {
            $song = Song::where('id', '=', $key)->first();
            $listSongs[] =  new SongResource($song);
        }

        return ['data'  =>  $listSongs];
    }
}
