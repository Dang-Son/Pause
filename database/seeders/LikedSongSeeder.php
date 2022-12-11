<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikedSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Insert a liked song for user
        DB::table('song_user')->insert([

            'user_id' => '1',
            'song_id' => '1'
        ]);
        // Insert a liked song for user
        DB::table('song_user')->insert([

            'user_id' => '1',
            'song_id' => '2'
        ]);
        // Insert a liked song for user
        DB::table('song_user')->insert([

            'user_id' => '1',
            'song_id' => '3'
        ]);
    }
}
