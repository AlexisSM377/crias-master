<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'crias_vendidas' => fake()->numberBetween($min = 1, $max = 30),
            'total_kilos' => fake()->numberBetween($min = 100, $max = 600),
            'precio_por_kilo' => fake()->numberBetween($min = 100, $max = 150),
            'subtotal' => fake()->numberBetween($min = 3000, $max = 5000),
            'total' => fake()->numberBetween($min = 4500, $max = 10000),
            'cliente_id' => Cliente::inRandomOrder()->first(),
        ];
    }
}
