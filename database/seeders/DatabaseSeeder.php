<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Tours',
        ]);
        Category::create([
            'title' => 'Servicies',
        ]);
        User::create([
            'name' => 'Saul Gongora',
            'email' => 'sg@admin.com',
            'password' => bcrypt('123456')
        ]);
        
        Post::factory()->count(24)->create();
    }
}
