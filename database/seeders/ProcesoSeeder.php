<?php

namespace Database\Seeders;

use App\Models\Proceso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proceso::create([
            'nombre' => 'Cuarentena'
        ]);
        Proceso::create([
            'nombre' => 'Saludable'
        ]);
        Proceso::create([
            'nombre' => 'Sacrificado'
        ]);
        Proceso::create([
            'nombre' => 'Engordamiento'
        ]);
        Proceso::create([
            'nombre' => 'Venta'
        ]);
    }
}
