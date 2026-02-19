<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RawMaterial>
 */
class RawMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $material = fake()->randomElement(['Harina Trigo', 'Levadura Fresca', 'Azúcar Moreno', 'Mantequilla', 'Huevos', 'Sal Marina']);
        return [
            'name' => $material,
            'description' => 'Lote de ' . strtolower($material) . ' de alta calidad.',
            'unit' => fake()->randomElement(['kg', 'l', 'docena']),
            'stock' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
