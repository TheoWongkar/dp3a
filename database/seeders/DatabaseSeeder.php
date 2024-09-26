<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Theoterra Wongkar',
            'email' => 'theo@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(3)->create();
        Post::factory(20)->create();
    }
}
