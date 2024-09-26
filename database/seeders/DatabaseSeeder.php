<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
use App\Models\Victim;
use App\Models\Reporter;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Perpetrator;
use App\Models\Status;
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
            'name' => 'Theoterra',
            'email' => 'theo@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::factory(2)->create();
        Victim::factory(3)->create();
        Perpetrator::factory(3)->create();
        Reporter::factory(3)->create();
        Report::factory(3)->create();
        Status::factory(3)->create();
    }
}
