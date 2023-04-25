<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(50)->create();

        $this->call([
            CorralTipoSeeder::class,
            CorralSeeder::class,
            ProcesoSeeder::class,
            ClasificacionCarneSeeder::class,
            ProveedorSeeder::class,
            ClienteSeeder::class,
            VentaSeeder::class,
            CriaSeeder::class,
            // DietaSeeder::class,
            // SensorRegistroSeeder::class
        ]);
    }
}
