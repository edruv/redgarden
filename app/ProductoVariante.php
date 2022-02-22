<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoVariante extends Model
{
	public $timestamps = false;
	
	protected $fillable = [
		'producto',
		'size',
		'presentacion',
		'stock',
		'precio',
		'descuento',
		'activo',
		'orden',
	];

	public function producto_ori(){
		return $this->belongsTo('App\Producto','id');
	}
}
