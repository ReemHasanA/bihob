<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'path' => fake()->word(),
            'alt_text' => fake()->word(),
            'sort_order' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
