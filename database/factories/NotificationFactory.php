<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\notification>
 */
class NotificationFactory extends Factory
{
    protected $model = Notification::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'link' => fake()->name(),
            'content' => fake()->name(),
            'user_id' => User::all()->random(1)->first()->id,
            'comment_id' => Comment::all()->random(1)->first()->id
        ];
    }
}
