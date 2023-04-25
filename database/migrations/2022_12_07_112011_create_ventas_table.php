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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('crias_vendidas');
            $table->double('total_kilos');
            $table->foreignId('precio_por_kilo');
            $table->foreignId('subtotal');
            $table->foreignId('total');
            $table->foreignId('cliente_id')->comment('Relacion delcliente al que se le hizo la venta')->constrained();
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
        Schema::dropIfExists('ventas');
    }
};
