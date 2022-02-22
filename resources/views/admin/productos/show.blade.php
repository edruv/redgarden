@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">

@endsection
@section('styleExtras')
	<style>
	</style>
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('productos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('productos.edit',$product->id) }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>
	<div class="row">
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-header text-center h5">
					ESP
				</div>
				<div class="card-body">
					<div>
						<span class="font-weight-bold">Nombre:</span> <span>{{$product->nombre}} </span>
					</div>
					<div>
						<span class="font-weight-bold">Categoria:</span> <span>{{$product->categoria->nombre}} </span>
					</div>
					{{-- <div>
						<span class="font-weight-bold">Precio:</span> <span>{{$product->precio}} </span> <br>
						@if ($product->descuento)
							<span class="font-weight-bold">descuento:</span> <span>{{ $product->descuento}} </span>
						@endif
					</div> --}}
					{{-- <div>
						<span class="font-weight-bold">Stock:</span> <span>{{$product->stock}} </span>
					</div> --}}
					<div class="form-group">
						<span class="font-weight-bold">Descripción:</span>
						<div class="">{!! $product->descripcion !!}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 my-2">
				<div class="card">
				<div class="card-header text-center h5">
					ENG
				</div>
				<div class="card-body">
					<div>
						<span class="font-weight-bold">Nombre:</span> <span>{{$product->nombre_en}} </span>
					</div>
					<div>
						<span class="font-weight-bold">Categoria:</span> <span>{{$product->categoria->nombre_en}} </span>
					</div>
					<div class="form-group">
						<span class="font-weight-bold">Descripción:</span>
						<div class="">{!! $product->descripcion_en !!}</div>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<span class="font-weight-bold">Meta-Title <i class="fas fa-info-circle" data-toggle="tooltip" title="Este titulo aparecerá debajo del título y la URL de tu página tal como aparece en los resultados del motor de búsqueda"></i>:</span>
						<input type="text" class="form-control editarajax" id="metaTitle" name="metaTitle" data-id="{{$product->id}}" data-table="configuracion" data-campo="metaTitle"  value="{{ $product->metaTitle }}">

					</div>
					<div class="mb-3">
						<span class="font-weight-bold">Meta-descripción <i class="fas fa-info-circle" data-toggle="tooltip" title="Esta descripción aparecerá debajo del título y la URL de tu página tal como aparece en los resultados del motor de búsqueda"></i>:</span>
						<textarea class="form-control editarajax" id="metaDescripcion" name="metaDescripcion" rows="3" data-id="{{$product->id}}" data-table="producto" data-campo="metaDescripcion"  style="resize:none;">{{ $product->metaDescripcion }}</textarea>
					</div>
				</div>
			</div>
		</div> --}}
	</div>

	<div class="">
		<div class="card mt-3">
			<form action="{{ route('productos.rel.update',$product->id) }}" id="fphoto" class="card-body text-center" method="post">
				<h5 class="card-title text-center"> Productos Relacionados</h5>
				@csrf
				@method('put')
				<input type="hidden" name="producto" value="{{$product->id}}">
				<select name="relacion[]" id="relacion" class="form-control select2" multiple>
					<option disabled></option>
					@foreach ($productos as $p)
					<option @if (in_array($p->id,$product->rel)) selected @endif value="{{$p->id}}">{{$p->nombre}}</option>
					@endforeach
				</select>
				<input type="submit" value="Guardar" class="btn btn-primary mt-2">
			</form>
		</div>
	</div>

	<div class="card mt-3">
		<div class="card-body text-center" id="fileuploader"></div>
		<div class="text-center mb-2">
			<small class=" text-muted"> Dimensiones sugeridas: 550 x 550 px</small>
		</div>
	</div>

    <div class="card my-3">
			<div class="card-header text-center">
				Galeria
			</div>
        <div class="row sortable card-body" data-table="ProductosPhoto">
            @foreach ($product->gallery as $img)
            <div class="col-12 col-md-6 col-lg-3 my-2 my-md-1 p-2" data-card="{{$img->id}}">
							<div class="card">
								<div class="d-flex justify-content-end">
									<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#ModalDel" data-id="{{$img->id}}" style="z-index: 2;">
										<i class="fa fa-trash-alt "></i>
									</button>
								</div>
								<a href="{{asset('img/photos/productos')}}/{{$img->image}}" target="_blank">
									<img src="{{asset('img/photos/productos')}}/{{$img->image}}" class="card-img-top card-gallery" alt="{{$img->image}}">
								</a>
							</div>
						</div>
        @endforeach
        </div>
    </div>

		<div class="card mt-3" >
			<div class="card-header grey lighten-2">
				<div class="d-flex align-items-center justify-content-between">

					<div class=" ">
						Variantes
					</div>
					<div class="">
						<button class="btn btn-sm py-1 btn-primary" data-toggle="modal" data-target="#variante"><i class="fa fa-plus "></i></button>
					</div>
				</div>
			</div>
			<div class="table-responsive">
				<table id="variantes" class="card-table table table-striped table-sm">
					<thead>
						<tr>
							{{-- <th scope="col">ID</th> --}}
							<th scope="col">Tamaño</th>
							<th scope="col">Presentacion</th>
							<th scope="col">Precio</th>
							<th style="width: 5rem;">Desct <small class="text-muted">(%)</small></th>
							<th style="width: 5rem;">Stock </th>
							<th style="width: 5rem; text-align:center;">Activo</th>
							<th style="width: 5rem; text-align:center;" scope="col">Ops</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($variantes as $var)
						<tr>
							<td>{{ $var->size->tamanio }}</td>
							<td>{{ $var->presentacion->tamanio }}</td>
							<td>{{ $var->precio }}</td>
							<td>
								<input type="text" class="form-control editarajax" id="descuento" name="descuento" data-id="{{$var->id}}" data-table="ProductoVariante" data-campo="descuento" value="{{ $var->descuento }}">
							</td>
							<td>
								<input type="text" class="form-control editarajax" id="stock" name="stock" data-id="{{$var->id}}" data-table="ProductoVariante" data-campo="stock" value="{{ $var->stock }}">
							</td>
							<td class="align-middle text-center">
								<div class="custom-control custom-switch" data-table="ProductoVariante" data-campo="activo">
									<input type="checkbox" @if ($var->activo) checked @endif class="custom-control-input swiToAj" data-id="{{$var->id}}" id="AswiTo-{{$var->id}}">
									<label class="custom-control-label" for="AswiTo-{{$var->id}}"></label>
								</div>
							</td>
							<td class="align-middle">
								<div class="dropdown text-center">
									<a href="" class="btn btn-link btn-sm dropdown py-0" id="dropvariant"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropvariant">
										<a class="dropdown-item" href="{{route('productos.variantes.show', $var->id)}}"><i class="fas fa-info-circle"></i> Ver más</a>
										<a class="dropdown-item" href="{{route('productos.variantes.edit', $var->id)}}"><i class="far fa-fw fa-edit"></i> Editar</a>
										<button type="button" class="dropdown-item" data-toggle="modal" data-target="#frameModalDel" data-id="{{$var->id}}"><i class="fas fa-fw fa-trash-alt"></i> Eliminar </button>
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>


	<div class="modal fade bottom" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar foto?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delphoto">Eliminar</button>
						<form id="photodel" action="{{ route('productos.pic.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="ipdel" name="photo" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="variante"  tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nueva variante</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('productos.variantes.store') }}" method="post">
				{{-- <form action="" method="post"> --}}
					@csrf
					<input type="hidden" name="producto" value="{{ $product->id }}">
					<div class="modal-body">
						<div class="form-group text-center">
							<label for="size">Tamaño</label>
							<select name="size" id="size" class="custom-select">
								<option selected nullable>Seleccionar tamaño</option>
								@foreach ($size as $s)
									<option value="{{$s->id}}">{{$s->tamanio}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group text-center">
							<label for="presentacion">Presentacion</label>
							<select name="presentacion" id="presentacion" class="custom-select">
								<option selected nullable>Seleccionar presentacion</option>
								@foreach ($presentacion as $pres)
									<option value="{{$pres->id}}">{{$pres->tamanio}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group text-center">
							<label for="stock">Stock</label>
							<input type="text" name="stock" id="stock" class="form-control">
						</div>
						<div class="form-group text-center">
							<label for="precio">Precio</label>
							<input type="text" name="precio" id="precio" class="form-control">
						</div>
						<div class="form-group text-center">
							<label for="descuento">Descuento</label>
							<input type="text" name="descuento" id="descuento" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
			</form>
			</div>
		</div>
	</div>

@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/jquery-file-upload.js')}}"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function(){

			$('.select2').select2();
			var drEvent = $('.dropify').dropify({

			// $('.dropify').dropify({
				messages: {
					'default': 'Arrastrar y soltar un archivo aquí o hacer clic',
					'replace': 'Arrastrar y soltar o hacer clic para reemplazar',
					'remove': 'Remover',
					'error': 'Ooops, algo malo pasó.'
				},
				error: {
	        'fileSize': 'El tamaño del archivo es demasiado grande (@{{ value }} máximo)',
	        'minWidth': 'El ancho de la imagen es demasiado pequeño (@{{ value }}}px min).',
	        'maxWidth': 'El ancho de la imagen es demasiado grande (@{{ value }}}px máximo).',
	        'minHeight': 'La altura de la imagen es demasiado pequeña (@{{ value }}}px min).',
	        'maxHeight': 'La altura de la imagen es demasiado grande (@{{ value }}px max).',
	        'imageFormat': 'El formato de la imagen no está permitido (@{{ value }} solamente).'
				}
			});

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
			});

			$('.delphoto').click(function(e) {
				$('#photodel').submit();
			});

			$("#fileuploader").uploadFile({
				url:"{{ route('productos.pic.store', $product->id ) }}",
				multiple: true,
				maxFileCount:10,
				fileName:"uploadedfile",
				allowedTypes: "jpg,jpeg,png",
				maxFileSize: 10485760,
				showFileCounter: false,
				showDelete: "false",
				showPreview:false,
				showQueueDiv:true,
				returnType:"json",
				formData: {
					"_token": $("meta[name='csrf-token']").attr("content"),
					"producto": {{ $product->id }}
				},
				onSuccess:function(files,data,xhr){
					location.reload();
				}
			});
		});
	</script>
@endsection
