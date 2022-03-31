@extends('layouts.admin')

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Meta Datos</h5>
					<div class="form-group">
						<label for="title"> Título del sitio </label>
						<input type="text" class="form-control editarajax" id="title" name="title" data-id="{{$data->id}}" data-table="configuracion" data-campo="title"  value="{{ $data->title }}">
					</div>
					<div class="form-group">
						<label for="description"> Descripción del sitio</label>
						<textarea class="form-control editarajax" id="description" name="description" rows="2" data-id="{{$data->id}}" data-table="configuracion" data-campo="description"  style="resize:none;">{{ $data->description }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">
						<label class="" for="banco">Datos para depósito</label>
					</h5>
					<div class="form-group">
						<textarea class="form-control editarajax" id="banco" name="banco" rows="6" data-id="{{$data->id}}" data-table="configuracion" data-campo="banco"  style="resize:none;">{{ $data->banco }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Impuestos</h5>
					<div class="form-group">
						<label for="iva">IVA</label>
						<input type="text" class="form-control editarajax" id="iva" name="iva" data-id="{{$data->id}}" data-table="configuracion" data-campo="iva" value="{{ $data->iva }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Cintillo</h5>
					<div class="form-group">
						<label for="cintillo">Texto</label>
						<input type="text" class="form-control editarajax" id="cintillo" name="cintillo" data-id="{{$data->id}}" data-table="configuracion" data-campo="cintillo"  value="{{ $data->cintillo }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Cuenta Paypal</h5>
					<div class="form-group">
						<label for="paypalemail">Email</label>
						<input type="text" class="form-control editarajax" id="paypalemail" name="paypalemail" data-id="{{$data->id}}" data-table="configuracion" data-campo="paypalemail"  value="{{ $data->paypalemail }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Datos Envia</h5>
					<div class="form-group">
						<label for="envia_key">Llave</label>
						<input type="text" class="form-control editarajax" id="envia_key" name="envia_key" data-id="{{$data->id}}" data-table="configuracion" data-campo="envia_key"  value="{{ $data->envia_key }}">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Datos de Envío (Envia)</h5>
					<div class="form-group">
						<label for="envio_telefono">Teléfono</label>
						<input type="text" class="form-control editarajax" id="envio_telefono" name="envio_telefono" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_telefono"  value="{{ $data->envio_telefono }}">
					</div>
					<div class="form-group">
						<label for="envio_email"> Email</label>
						<input type="text" class="form-control editarajax" id="envio_email" name="envio_email" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_email"  value="{{ $data->envio_email }}">
					</div>
					<div class="form-group">
						<label for="envio_calle"> Calle</label>
						<input type="text" class="form-control editarajax" id="envio_calle" name="envio_calle" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_calle"  value="{{ $data->envio_calle }}">
					</div>
					<div class="form-group">
						<label for="envio_numero">Numero Ext </label>
						<input type="text" class="form-control editarajax" id="envio_numero" name="envio_numero" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_numero"  value="{{ $data->envio_numero }}">
					</div>
					<div class="form-group">
						<label for="envio_colonia">Colonia </label>
						<input type="text" class="form-control editarajax" id="envio_colonia" name="envio_colonia" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_colonia"  value="{{ $data->envio_colonia }}">
					</div>
					<div class="form-group">
						<label for="envio_ciudad">Ciudad </label>
						<input type="text" class="form-control editarajax" id="envio_ciudad" name="envio_ciudad" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_ciudad"  value="{{ $data->envio_ciudad }}">
					</div>
					<div class="form-group">
						<label for="envio_estado_code">Estado</label>
						<select class="form-control editarajax" id="envio_estado_code" name="envio_estado_code" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_estado_code"  value="{{ $data->envio_estado_code }}">
							@foreach ($estados as $est)
								<option @if ($data->envio_estado_code == $est->code_2_digits ) selected @endif value="{{$est->code_2_digits}}">{{$est->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="envio_cp">Código Postal</label>
						<input type="text" class="form-control editarajax" id="envio_cp" name="envio_cp" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio_cp"  value="{{ $data->envio_cp }}">
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('jsLibExtras2')
@endsection
