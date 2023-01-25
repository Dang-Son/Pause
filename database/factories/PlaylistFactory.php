<?php

namespace Database\Factories;

use App\Models\Playlist;
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

        $image_link = 'https://picsum.photos/id/' . rand(10, 200) . '/400';


        $contents = file_get_contents($image_link, false, $context);



        // $palette = Palette::fromFilename('/Users/vfa/Documents/Projects/pause/demo.jpg');
        $palette = Palette::fromContents($contents);




        $color = $palette->getMostUsedColors(1);

        $extractor = new ColorExtractor($palette);

        $colors = $extractor->extract(5);




        // Get bg color from image
        $bg_color = Color::fromIntToHex(array_values($colors)[0]);

        return [
            //
            "name" => fake()->colorName(),
            'bg_color' => $bg_color,
            'imageURL' => $image_link,
        ];
    }
}
