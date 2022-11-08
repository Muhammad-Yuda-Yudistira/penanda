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
            "name" => fake()->sentence(3),
            "slug" => fake()->slug(),
            "version" => fake()->semver(),
            "name_file" => "bookmark.html",
            "category_id" => fake()->randomDigit(mt_rand(1,3)),
            "tags" => fake()->sentences(1, 3),
            "summary" => fake()->paragraph(),
            "description" => fake()->paragraph(10, 20)
        ];
    }
}
