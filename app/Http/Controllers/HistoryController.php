<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Http\Resources\HistoryResource;
use App\Models\Song;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\HistoryFactory;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historys = QueryBuilder::for(History::class)
            ->allowedIncludes(['user', 'song'])
            ->allowedSorts(['id'])
            ->jsonPaginate();
        return HistoryResource::collection($historys);
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
     * @param  \App\Http\Requests\StoreHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHistoryRequest $request, User $user, Song $song)
    {

        function handleHer(User $user, Song $song)
        {
            History::create([
                'user_id' => $user->id,
                'song_id' => $song->id,
                'views' => 0
            ]);
            return;
        }


        try {
            $last_history = History::where('user_id', $user->id)
                ->where('song_id', $song->id)
                ->firstOrFail();


            $created_at_date = Carbon::parse($last_history->created_at);
            $diffInMin = Carbon::now()->diffInMinutes($created_at_date);

            // If diff < 10 -> increase views 
            if ($diffInMin < 10) {
                $last_history->views = $last_history->views + 1;
                $last_history->update();


                $song->views = $song->views + 1;
                $song->update();
            }

            return $last_history;
        } catch (\Exception $e) {
            $new_his = History::create([
                'user_id' => $user->id,
                'song_id' => $song->id,
                'views' => 1,
            ]);
            return $new_his;
        }

        // $song = Song::create($request->input(("data.attributes")));
        // return new SongResource($song);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        $history = QueryBuilder::for(History::where('id', $history->id))
            ->allowedIncludes(['user', 'song'])
            ->firstOrFail();
        return new HistoryResource($history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHistoryRequest  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoryRequest $request, History $history)
    {
        // $history->update(['content' => $request->input('content')]);
        // return $history;
        return 'se~ update sau';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        $history->delete();
        return response(null, 204);
    }


    public function get_history_of_user(User $user)
    {
        // $results =  DB::table('histories')
        //     ->select(['user_id'])
        //     ->groupBy('user_id')->get();


        $rerults =         QueryBuilder::for(History::where('user_id', $user->id))
            ->take(10)
            ->orderByDesc('created_at')
            ->get();
        return HistoryResource::collection($rerults->load('song'));
    }
}
