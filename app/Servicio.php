<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
	protected $fillable = [
		'nombre',
		'nombre_en',
		'descripcion',
		'descripcion_en',
		'inicio',
		'activo',
		'orden',
	];

	public function fotos() {
		return $this->hasMany('App\ServiciosPhoto', 'servicio');
	}
}
