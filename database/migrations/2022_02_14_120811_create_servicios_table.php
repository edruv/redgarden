<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('nombre');
						$table->string('nombre_en');
						$table->text('descripcion')->nullable();
						$table->text('descripcion_en')->nullable();
						$table->boolean('inicio')->default(0);
						$table->boolean('activo')->default(1);
						$table->integer('orden')->default(666);
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
        Schema::dropIfExists('servicios');
    }
}
