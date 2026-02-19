<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => 'ORD-' . strtoupper(fake()->bothify('??###')),
            'status' => fake()->randomElement(['pendiente', 'en_proceso', 'completado', 'cancelado']),
            'total_amount' => fake()->randomFloat(2, 50, 500),
        ];
    }
}
