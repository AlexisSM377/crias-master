<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_registros', function (Blueprint $table) {
            $table->id();
            $table->integer('frecuencia_cardiaca')->comment('Frecuencia cardiaca de la cría');
            $table->integer('frecuencia_sanguinea')->comment('Frecuencia sanguínea de la cría');
            $table->integer('frecuencia_respiratoria')->comment('Frecuencia respiratoria de la cría');
            $table->double('temperatura', 11, 2)->comment('Temperatura de la cría');
            $table->boolean('saludable')->comment('false: No, true: Si');
            $table->foreignId('cria_id')->comment('Relacion de los registros del sensor con la cría')->constrained();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_registros');
    }
};
