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
            "name" => "Web Backend Developer Bookmark",
            "slug" => "web-backend-developer-bookmark",
            "version" => fake()->semver(),
            "name_file" => "web backend developer bookmark.html",
            "category_id" => 1,
            "summary" => "Bookmark untuk web backend developer",
            "description" => fake()->paragraph(10, 20)
        ];
    }
}
