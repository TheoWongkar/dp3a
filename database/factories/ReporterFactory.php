<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reporter>
 */
class ReporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'whatsapp' => fake()->phoneNumber(),
            'telegram' => fake()->phoneNumber(),
            'instagram' => fake()->firstName(),
            'email' => fake()->email(),
        ];
    }
}
