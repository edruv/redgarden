<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->string('nombre');
					$table->string('nombre_en');
					$table->text('descripcion')->nullable();
					$table->text('descripcion_en')->nullable();
					$table->integer('categoria');
					$table->boolean('inicio')->default(0);
					$table->boolean('activo')->default(1);
					$table->integer('orden')->default(666);
					// $table->foreign('marca')->references('id')->on('marcas')->onDelete('cascade');
					$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
