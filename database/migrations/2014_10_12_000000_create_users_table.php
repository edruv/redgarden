<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name')->nullable();
			$table->string('lastname')->nullable();
			$table->string('username')->unique()->nullable();
			$table->string('email')->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('telefono')->nullable();
			$table->string('facebook')->nullable();
			$table->string('empresa')->nullable();
			$table->string('avatar')->nullable();
			$table->string('rfc')->nullable();
			$table->boolean('activo')->default(1);
			$table->integer('role')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
			$table->SoftDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
