<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        User::create([
            "name" => "Ferdinand Anggris",
            "email" => "ferdinandanggris@gmail.com",
            "password" => bcrypt("anggrisblog123?")
        ]);

        Category::create([
            "name" => "Operating System",
            "slug" => "operating-system"
        ]);


        Category::create([
            "name" => "Web Design",
            "slug" => "web-design"
        ]);

        Post::factory(20)->create();
    }
}
