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
        $image_link = 'https://picsum.photos/id/' . rand(10, 50) . '/800';
        return [
            'content' => fake()->name(),
            'user_id' => User::all()->random(1)->first()->id,
            'song_id' => Song::all()->random(1)->first()->id,
            'bg_url' => $image_link
        ];
    }
}
