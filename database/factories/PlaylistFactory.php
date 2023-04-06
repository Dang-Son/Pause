<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


use League\ColorExtractor\Color;
use League\ColorExtractor\Palette;
use League\ColorExtractor\ColorExtractor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{

    protected $model = Playlist::class;
    protected $fillable = ['name', 'category', 'likes', 'views'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        $context = stream_context_create(
            array(
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );

        $image_link = 'https://picsum.photos/seed/' . rand(1, 3000) . '/1000/1000';

        $user_created_id = User::inRandomOrder()->first();
        $song_id = Song::inRandomOrder()->first();
        $category = ['Rap', 'Chill', 'Bolero', 'Pop'];


        return [
            //
            "name" => fake()->colorName(),
            'bg_color' => '#fff292',
            'user_id' => $user_created_id->id,
            'imageURL' => $image_link,
            'category' => $category[array_rand($category)],
            'views' => fake()->randomNumber(4, true),
            'likes' => fake()->randomNumber(4, true)
        ];
    }
}
