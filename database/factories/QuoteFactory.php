<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1095 equals 3 years
        $createdAt = now()->subDays(rand(0, 1095));

        return [
            'customer_id' => $this->faker->randomNumber(5),
            'payment_date' => $createdAt,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
