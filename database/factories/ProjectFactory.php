<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Campaña de Navidad', 'Pastelería Creativa', 'Pan Artesano Pro', 'Expansión de Sucursal', 'Taller de Cupcakes']),
            'description' => fake()->paragraph(),
            'hours' => fake()->numberBetween(20, 100),
            'starting_date' => fake()->date(),
        ];
    }
}
