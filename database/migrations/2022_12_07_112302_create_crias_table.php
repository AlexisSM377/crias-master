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
        Schema::create('crias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->comment('Nombre con la que se identifica la cría');
            $table->string('url_imagen')->nullable();
            $table->double('peso', 11, 2)->comment('Peso de la cría');
            $table->integer('color_muscular')->comment('Color de musculo, 3-5: Grasa tipo 1, 1,2,6,7: Grasa tipo 2');
            $table->integer('marmoleo')->comment('Calidad de marmoleo en escala de 1-5');
            $table->double('costo', 11, 2)->comment('Costo de la cría');
            $table->boolean('cria_cuarentena')->default(false)->comment('false: No esta en cuarentena, true: Esta en cuarentena');
            $table->longText('descripcion')->comment('Descripción de la cría');
            $table->foreignId('proveedor_id')->comment('Relacion de la cría con proveedor')->constrained();
            $table->foreignId('proceso_id')->comment('Relacion de la cría con proveedor')->constrained();
            $table->foreignId('clasificacion_carne_id')->comment('Relacion de la cría con la clasificación de la carne')->constrained();
            $table->foreignId('corral_id')->comment('Relacion de la cría con el corral')->constrained();
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
        Schema::dropIfExists('crias');
    }
};
