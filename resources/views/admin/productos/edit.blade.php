@extends('layouts.admin')

@section('cssExtras')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
	<style media="screen">
		.cat{
			font-size: 1.3em;
		}
	</style>
	<div class="row mb-4 px-2">
		<a href="{{ route('productos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('productos.update',$product->id)}}" method="post">
					@csrf
					@method('put')
					<div class="row text-center">
						{{-- <div class="col-md">
							<label for="clave">SKU</label>
							<input type="text" name="clave" id="clave" class="form-control" value="{{ old('clave') }}" required>
						</div> --}}
						<div class="col-md form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" value="{{ $product->nombre }}" required>
						</div>
						<div class="col-md form-group">
							<label for="nombre_en">Nombre (EN)</label>
							<input type="text" name="nombre_en" id="nombre_en" class="form-control" value="{{ $product->nombre_en }}" required>
						</div>
					{{-- </div>
					<div class="form-group row text-center"> --}}

					</div>
					<div class="row">
						<div class="col-12 col-md-6 form-group text-center">
							<label for="categoria">Categoria</label>
							<select name="categoria" id="categoria" class="custom-select">
								<option disabled >Seleccionar Categoria</option>
								@foreach ($categParent as $parent)
									<option @if ($product->categoria == $parent->id) selected @endif value="{{$parent->id}}">{{ ucfirst($parent->nombre)}}</option>
								@endforeach
							</select>
						</div>
					</div>
					{{-- <div class="row text-center">
						<div class="col-md form-group">
							<label for="precio">Precio</label>
							<input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" required>
						</div>
						<div class="col-md form-group">
							<label for="descuento">Descuento</label>
							<input type="text" name="descuento" id="descuento" class="form-control" value="{{ old('descuento') }}" placeholder="%">
						</div>
					</div> --}}
					<div class="form-group text-center">
						<label for="descripcion">Descripción</label>
						<textarea name="descripcion" id="descripcion" rows="10" class="texteditor form-control" style="resize:none;">{{ $product->descripcion }}</textarea>
					</div>
					<div class="form-group text-center">
						<label for="descripcion_en">Descripción (EN)</label>
						<textarea name="descripcion_en" id="descripcion_en" rows="10" class="texteditor form-control" style="resize:none;">{{ $product->descripcion_en }}</textarea>
					</div>
					<hr>
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

@endsection
@section('jsLibExtras2')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {

		});
	</script>
@endsection