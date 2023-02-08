<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artist;
use App\Models\Comment;
use App\Models\History;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $this->call(PlaylistSeeder::class);
        $this->call(SongSeeder::class);


        $this->call(ArtistSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(NotificationSeeder::class);


        $this->call(FollowedPlaylistSeeder::class);

        $this->call(SongPlaylistSeeder::class);

        DB::table('followed_artists')->insert([

            'user_id' => '2',
            'artist_id' => '1'
        ]);
        DB::table('followed_artists')->insert([

            'user_id' => '3',
            'artist_id' => '1'
        ]);
    }
}
