<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    protected $model = Song::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $image_link = 'https://picsum.photos/id/' . rand(10, 200) . '/800';

        $artist_id = Artist::factory()->create()->id;
        $playlist_id = Playlist::inRandomOrder()->first();
        return [
            'name' => fake()->sentence(rand(1, 3)),
            'liked' => fake()->randomDigitNotNull(),
            'views' => fake()->randomDigitNotNull(),
            'category' => fake()->name(),
            'imageURL' =>  $image_link,
            'audioURL' => 'https://res.cloudinary.com/dck0bidwh/video/upload/v1674927822/ofrljpynd1gheipnkee7.mp3',
            'artist_id' => $artist_id,
            'playlist_id' => $playlist_id->id
        ];
    }
}
