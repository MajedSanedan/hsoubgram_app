<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
    public function definition(): array
    {
        $images =[ '1.jpg','2.jpg','3.jpg','4.jpg','5.jpg'];
        return [
            'description' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'image' => 'posts/'. fake()->randomElement($images),
            'user_id' => User::factory(),
        ];
    }
}
