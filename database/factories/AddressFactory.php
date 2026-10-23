<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'street' => fake()->streetName(),
            'apartment' => fake()->word(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'is_default' => fake()->boolean(),
        ];
    }
}
