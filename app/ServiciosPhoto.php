<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiciosPhoto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'servicio','titulo','image','orden',
	];

	public function servicio() {
		return $this->belongsTo('App\Servicio');
	}
}
