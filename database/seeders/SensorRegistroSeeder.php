<?php

namespace Database\Seeders;

use App\Models\SensorRegistro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SensorRegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SensorRegistro::factory()->count(10)->create();
    }
}
