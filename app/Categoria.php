<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	public $timestamps = false;

	protected $fillable = [
			'nombre','slug','parent','activo','orden',
	];
}
