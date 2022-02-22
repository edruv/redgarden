<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios_photos', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->unsignedBigInteger('servicio');
					$table->string('titulo')->nullable();
					$table->string('image')->nullable();
					$table->integer('orden')->default('666');
					$table->foreign('servicio')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios_photos');
    }
}
