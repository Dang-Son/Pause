<?php

namespace Database\Factories;

use App\Models\History;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    protected $model = History::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'views' => fake()->numberBetween(1, 200),
            'user_id' => User::all()->random(1)->first()->id,
            'song_id' => Song::all()->random(1)->first()->id,
        ];
    }
}
