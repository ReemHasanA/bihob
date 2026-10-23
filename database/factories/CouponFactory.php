<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'code' => fake()->word(),
            'type' => fake()->randomElement(["percent","fixed"]),
            'value' => fake()->randomFloat(2, 0, 999999.99),
            'expires_at' => fake()->dateTime(),
            'is_active' => fake()->boolean(),
        ];
    }
}
