<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookmark>
 */
class BookmarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->word(),
            "slug" => fake()->slug(),
            "version" => fake()->semver(),
            "category_id" => rand(1, 4),
            "user_id" => rand(1, 6),
            "file" => "web-backend-developer-bookmark.html",
            "summary" => fake()->sentence(),
            "description" => fake()->paragraph(10, 20)
        ];
    }
}
