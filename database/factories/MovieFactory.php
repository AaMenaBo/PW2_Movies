<?php

namespace Database\Factories;

use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, true),
            'description' => substr($this->faker->paragraph(2, true), 0, 255),
            'release_date' => fake()->date('Y-m-d'),
            'studio_id' => $this->faker->numberBetween(1, Studio::count()),
        ];
    }
}
