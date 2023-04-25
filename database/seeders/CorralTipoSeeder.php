<?php

namespace Database\Seeders;

use App\Models\CorralTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CorralTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorralTipo::create([
                    'tipo' => 1,
                    'nombre' => 'general'
                ]);

        CorralTipo::create([
            'tipo' => 2,
            'nombre' => 'cuarentena'
        ]);
    }
}
