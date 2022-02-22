<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TratamientosPhoto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'tratamiento','titulo','image','orden',
	];

	public function tratamiento() {
		return $this->belongsTo('App\Tratamiento');
	}
}
