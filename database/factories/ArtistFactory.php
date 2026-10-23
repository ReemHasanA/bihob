<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'bio_ar' => fake()->text(),
            'bio_en' => fake()->text(),
            'slug' => fake()->slug(),
            'avatar' => fake()->word(),
            'instagram' => fake()->word(),
        ];
    }
}
