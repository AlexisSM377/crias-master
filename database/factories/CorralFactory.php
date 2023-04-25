<?php

namespace Database\Factories;

use App\Models\CorralTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Corral>
 */
class CorralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->bothify('Corral ##??'),
            'corral_tipos_id' => CorralTipo::inRandomOrder()->first()
        ];
    }
}
