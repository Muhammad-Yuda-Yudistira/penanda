<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Bookmark::create([
            "name" => "Web Backend Developer Bookmark",
            "slug" => "web-backend-developer-bookmark",
            "version" => 1,
            "category_id" => 1,
            "file" => "web-backend-developer-bookmark.html",
            "summary" => "Bookmark untuk web backend developer",
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, a voluptatem voluptatum quisquam quae ipsa saepe maiores dignissimos nostrum explicabo minus velit aliquam autem illo laborum maxime? Iusto, delectus illum?"
            ]);

        Bookmark::factory(9)->create();
        Category::factory(1)->create();
    }
}
