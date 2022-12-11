<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikedPlaylistSeeder extends Seeder
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
        DB::table('playlist_user')->insert([

            'user_id' => '1',
            'playlist_id' => '1'
        ]);


        DB::table('playlist_user')->insert([

            'user_id' => '1',
            'playlist_id' => '2'
        ]);

        DB::table('playlist_user')->insert([

            'user_id' => '1',
            'playlist_id' => '3'
        ]);
    }
}
