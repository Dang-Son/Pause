<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artist;
use App\Models\Comment;
use App\Models\History;
use App\Models\Notification;
use App\Models\Playlist;
use App\Models\User;
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
        Artist::create([
            'name' => 'Dang Son',
            'user_id' => '1',
            'followed' => 0,
        ]);


        Playlist::create([
            "name" => 'MMMo',
            'bg_color' => '#fff292',
            'user_id' => '1',
            'imageURL' => 'https://picsum.photos/seed/2515/1000/1000',
            'category' => 'Bolero',
            'views' => 80,
            'likes' => 45
        ]);
        //

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
        $image_link = 'https://picsum.photos/id/' . rand(10, 50) . '/800';
        Notification::create([
            'content' => 'Người dùng ASDFGG đã thêm bài hát mới 1',
            'user_id' => '1',
            'song_id' => '3',
            'bg_url' => $image_link
        ]);
        Notification::create([
            'content' => 'Người dùng ASDFGG đã thêm bài hát mới 2',
            'user_id' => '1',
            'song_id' => '2',
            'bg_url' => $image_link

        ]);
        Notification::create([
            'content' => 'Người dùng ASDFGG đã thêm bài hát mới 3',
            'user_id' => '1',
            'song_id' => '4',
            'bg_url' => $image_link

        ]);

        User::create([
            'name' => 'Dang Son',
            'email' => 'sonvjppro@gmail.com',
            'password' => '123456789',
            'avtURL' => $image_link,

        ]);
    }
}
