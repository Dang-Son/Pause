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
        $artist_id = Artist::factory()->create()->id;
        return [
            'name' => fake()->name(),
            'liked' => fake()->randomDigitNotNull(),
            'views' => fake()->randomDigitNotNull(),
            'category' => fake()->name(),
            'artist_id' => $artist_id
        ];
    }
}
