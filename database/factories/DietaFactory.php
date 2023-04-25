<?php

namespace Database\Factories;

use App\Models\Cria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dieta>
 */
class DietaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dieta' => fake()->text($maxNbChars = 30),
            'tratamiento' => fake()->text($maxNbChars = 30),
            'cria_id' => Cria::inRandomOrder()->first()
        ];
    }
}
