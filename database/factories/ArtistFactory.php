<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    protected $model = Artist::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::factory()->create()->id;
        return [
            'name' => fake()->name(),
            'followed' => fake()->randomDigitNotNull(),
            'user_id' => $user_id
        ];
    }
}
