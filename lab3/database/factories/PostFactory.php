<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => Str::random(30),
            'code' => Str::random(10),
            'title' => Str::random(10),
            //'created_at' => date("Y-m-d H:i:s"),
            'author' => Str::random(10)
        ];
    }
}
