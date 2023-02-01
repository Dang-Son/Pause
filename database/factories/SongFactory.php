<?php

namespace Database\Factories;

use App\Models\Artist;
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
        return [
            'name' => fake()->sentence(rand(1, 3)),
            'liked' => fake()->randomDigitNotNull(),
            'views' => fake()->randomDigitNotNull(),
            'imageURL' =>  $image_link,
            'artist_id' => $artist_id
        ];
    }
}
