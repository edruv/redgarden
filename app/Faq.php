<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'pregunta',
			'pregunta_en',
			'respuesta',
			'respuesta_en',
			'orden',
	];
}
