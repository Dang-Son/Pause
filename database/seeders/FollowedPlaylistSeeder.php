<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FollowedPlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($x = 0; $x <= 5; $x++) {

                // Seed followed playlists
                DB::table('followed_playlists')->insertOrIgnore([

                    'user_id' => $user->id,
                    'playlist_id' => Playlist::all()->random()->id
                ]);
            }
        }
    }
}
