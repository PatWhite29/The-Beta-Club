<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileName = $this->faker->numberBetween(1,3) .'.jpg';
        return [
            'path' => "images/boulders/{$fileName}",
        ];
    }
    public function user()
    {
        $fileName = $this->faker->numberBetween(1,3) .'.jpg';

        return $this->state([
            'path' => "images/users/{$fileName}",
        ]);
    }
}
