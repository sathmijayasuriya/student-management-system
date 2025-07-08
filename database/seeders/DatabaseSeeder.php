<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 users
        $users = \App\Models\User::factory(10)->create();

        // Create 50 students assigned to random users
        \App\Models\Student::factory(50)
            ->create([
                'user_id' => fn() => $users->random()->id
            ]);
    }
}