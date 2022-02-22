<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
	protected $fillable = [
		'nombre','descripcion','precio','descuento','url','inicio','activo','orden',
	];


	public function fotos() {
		return $this->hasMany('App\TratamientosPhoto', 'tratamiento');
	}

}
