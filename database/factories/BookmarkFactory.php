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
            "name" => "web backend developer bookmark",
            "slug" => fake()->slug(),
            "version" => fake()->semver(),
            "category_id" => 1,
            "summary" => fake()->sentence(),
            "description" => fake()->paragraph(10, 20)
        ];
    }
}
