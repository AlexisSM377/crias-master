<?php

namespace Database\Seeders;

use App\Models\ClasificacionCarne;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasificacionCarneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClasificacionCarne::create([
            'nombre' => 'Grasa Tipo 1'
        ]);

        ClasificacionCarne::create([
            'nombre' => 'Grasa Tipo 2'
        ]);
    }
}
