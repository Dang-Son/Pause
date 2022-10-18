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

        $this->call(SongSeeder::class);
        $this->call(PlaylistSeeder::class);

        DB::table('playlist_song')->insert([

            'playlist_id' => '1',
            'song_id' => '1'
        ]);
        $this->call(ArtistSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(NotificationSeeder::class);
    }
}
