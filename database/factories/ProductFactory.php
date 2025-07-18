<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'prd_name' => fake()->words(3, true),
            'prd_description' => fake()->sentence(),
            'prd_quantity' => fake()->numberBetween(0, 100),
            'prd_price' => fake()->randomFloat(2, 0, 500),
        ];
    }
}
