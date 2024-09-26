<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_number' => 'TICKET-12345678',
            'user_id' => fake()->numberBetween(1, 3),
            'victim_id' => fake()->numberBetween(1, 3),
            'perpetrator_id' => fake()->numberBetween(1, 3),
            'reporter_id' => fake()->numberBetween(1, 3),
            'violence_category' => 'Kekerasan Fisik',
            'description' => fake()->sentence(),
            'date' => fake()->date(),
            'scene' => fake()->address(),
            'evidence' => 'https://png.pngtree.com/thumb_back/fh260/background/20230516/pngtree-cute-wallpapers-cats-wallpapers-hd-4k-wallpapers-desktop-wallpapers-hd-image_2562853.jpg'
        ];
    }
}
