<?php

namespace Database\Factories;

use App\Models\Parent;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
            'image' => fake()->word(),
            'slug' => fake()->slug(),
            'parent_id' => Parent::factory(),
            'sort_order' => fake()->numberBetween(-10000, 10000),
            'is_active' => fake()->boolean(),
        ];
    }
}
