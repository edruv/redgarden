<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'titulo',
			'titulo_en',
			'descripcion',
			'descripcion_en',
			'archivo',
	];

}
