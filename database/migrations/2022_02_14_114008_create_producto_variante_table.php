<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoVarianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_variantes', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->unsignedBigInteger('producto');
					$table->unsignedBigInteger('size');
					$table->unsignedBigInteger('presentacion');
					$table->string('stock')->nullable();
					$table->string('precio');
					$table->string('descuento')->nullable();
					$table->boolean('activo')->default(1);
					$table->integer('orden')->default(666);

					$table->string('tipo_envio')->nullable();
					$table->string('peso')->nullable();
					$table->string('largo')->nullable();
					$table->string('ancho')->nullable();
					$table->string('alto')->nullable();

					$table->foreign('producto')->references('id')->on('productos')->onDelete('cascade');
					$table->foreign('size')->references('id')->on('producto_sizes')->onDelete('cascade');
					$table->foreign('presentacion')->references('id')->on('producto_presentacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_variantes');
    }
}
