<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		"title",
		"description",
		"prodspag",
		"paypalemail",
		"destinatario",
		"destinatario2",
		"remitente",
		"remitentepass",
		"remitentehost",
		"remitenteport",
		"remitenteseguridad",
		"telefono",
		"telefono2",
		"telefono3",
		"whatsapp",
		"whatsapp2",
		"whatsapp3",
		"direccion",
		"direccion2",
		"direccion3",
		"facebook",
		"instagram",
		"youtube",
		"linkedin",
		"envio",
		"envioglobal",
		"iva",
		"incremento",
		"banco",
		"mapa",
		"envia_key",
		"envio_telefono",
		"envio_email",
		"envio_calle",
		"envio_numero",
		"envio_colonia",
		"envio_ciudad",
		"envio_estado",
		"envio_estado_code",
		"envio_cp",
	];
}
