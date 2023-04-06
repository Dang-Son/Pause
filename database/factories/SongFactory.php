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
            'imageURL' =>  $image_link,
            'audioURL' => 'https://res.cloudinary.com/dck0bidwh/video/upload/v1675850974/bs1sjno6gknfldz4iwub.mp3',
            'artist_id' => 3,
            'playlist_id' => $playlist_id->id,
            'description' => fake()->sentence(rand(10, 16))
        ];
    }
}
