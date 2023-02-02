<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongPlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $playlists = Playlist::all();


        foreach ($playlists as $playlist) {


            DB::table('playlist_song')->insertOrIgnore([

                'playlist_id' => $playlist->id,
                'song_id' => Song::inRandomOrder()->first()->id,
            ]);
            DB::table('playlist_song')->insertOrIgnore([

                'playlist_id' => $playlist->id,
                'song_id' => Song::inRandomOrder()->first()->id,
            ]);
            DB::table('playlist_song')->insertOrIgnore([

                'playlist_id' => $playlist->id,
                'song_id' => Song::inRandomOrder()->first()->id,
            ]);
        }
    }
}
