<?php

namespace Database\Factories;

use App\Models\Cria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SensorRegistro>
 */
class SensorRegistroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'frecuencia_cardiaca' => fake()->numberBetween($min = 65, $max = 85),
            'frecuencia_sanguinea' => fake()->numberBetween($min = 7, $max = 12),
            'frecuencia_respiratoria' => fake()->numberBetween($min = 12, $max = 23),
            'temperatura' => fake()->numberBetween($min = 35, $max = 41),
            'saludable' => fake()->boolean(),
            'cria_id' => Cria::inRandomOrder()->first()
        ];
    }
}
