<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => fake()->name(),
            'user_id' => User::all()->random(1)->first()->id,
            'song_id' => Song::all()->random(1)->first()->id
        ];
    }
}
