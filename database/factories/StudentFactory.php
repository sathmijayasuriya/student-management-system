<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'course' => fake()->randomElement(['Computer Science', 'Software Engineering', 'Data science', 'Cyber security', 'Mechanical Engineering', 'Interactive Media']),
            'age' => fake()->numberBetween(18, 30),
            'user_id' => User::factory(),
        ];
    }
}