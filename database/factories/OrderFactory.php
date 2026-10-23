<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_number' => fake()->word(),
            'customer_name' => fake()->word(),
            'customer_email' => fake()->word(),
            'customer_phone' => fake()->word(),
            'total_amount' => fake()->randomFloat(2, 0, 99999999.99),
            'shipping_amount' => fake()->randomFloat(2, 0, 99999999.99),
            'tax_amount' => fake()->randomFloat(2, 0, 99999999.99),
            'discount_amount' => fake()->randomFloat(2, 0, 99999999.99),
            'coupon_id' => Coupon::factory(),
            'status' => fake()->randomElement(["pending","processing","shipped","delivered","cancelled"]),
            'payment_method' => fake()->word(),
            'payment_status' => fake()->randomElement(["pending","paid","failed","refunded"]),
            'shipping_address' => '{}',
            'notes' => fake()->text(),
        ];
    }
}
