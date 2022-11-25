<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => "Muhammad Yuda Yudistira",
            'username' => "yudistira",
            'email' => "yudistira@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('yudistira'),
            'remember_token' => Str::random(10)
        ]);

        User::factory(5)->create();
        Bookmark::create([
            "name" => "Web Backend Developer Bookmark",
            "slug" => "web-backend-developer-bookmark",
            "version" => 1,
            "category_id" => 1,
            "file" => "web-backend-developer-bookmark.html",
            "summary" => "Bookmark untuk web backend developer",
            "description" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, a voluptatem voluptatum quisquam quae ipsa saepe maiores dignissimos nostrum explicabo minus velit aliquam autem illo laborum maxime? Iusto, delectus illum?"
            ]);
        Bookmark::factory(29)->create();
        Category::factory(4)->create();
    }
}
