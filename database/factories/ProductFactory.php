<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(1),
            'location' => $this->faker->paragraph(1),
            'grade' => $this->faker->numberBetween(1, 12),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
