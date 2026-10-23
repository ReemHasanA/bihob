<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name_ar' => fake()->word(),
            'name_en' => fake()->word(),
            'description_ar' => fake()->text(),
            'description_en' => fake()->text(),
            'slug' => fake()->slug(),
            'price' => fake()->randomFloat(2, 0, 99999999.99),
            'stock' => fake()->numberBetween(-10000, 10000),
            'sku' => fake()->word(),
            'weight' => fake()->randomFloat(2, 0, 999999.99),
            'length' => fake()->randomFloat(2, 0, 999999.99),
            'width' => fake()->randomFloat(2, 0, 999999.99),
            'height' => fake()->randomFloat(2, 0, 999999.99),
            'category_id' => Category::factory(),
            'artist_id' => Artist::factory(),
            'is_active' => fake()->boolean(),
        ];
    }
}
