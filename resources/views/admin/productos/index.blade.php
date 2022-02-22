@extends('layouts.admin')

{{-- @section('cssExtras') @endsection --}}

{{-- @section('jsLibExtras') @endsection --}}

@section('styleExtras')
	<style media="screen">
		.custom-switch{text-align: center !important;}
	</style>
@endsection
@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col disabled col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('categ.index') }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-folder"></i> Categorías</a>
		<a href="{{ route('productos.create') }}" class="col col-md-2 btn btn-sm green darken-2 text-white"><i class="fa fa-plus"></i> Nuevo</a>
	</div>
<?php // NOTE: agregar data table ?>
	<div class="col-12 px-0 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-sm">
						<thead>
							<th style="">Producto</th>
							<th style="">Categoria</th>
							<th class="text-center" style="width: 5rem;">Stock</th>
							<th class="text-center" style="width: 5rem;">En inicio</th>
							<th class="text-center" style="width: 5rem;">Activo</th>
							<th class="text-center" style="width: 4rem;">Ops</th>
						</thead>
						<tbody class="sortable" data-table="Producto">
							@foreach ($products as $pro)
								<tr data-card="{{$pro->id}}">
									<td class="align-middle">
										<a href="{{route('productos.show', $pro->id)}}">
											{{$pro->nombre}}
										</a>
									</td>
									<td class="align-middle">{{ ucfirst($pro->categoria->nombre) }}</td>
									<td class="align-middle text-center">
										{{ $pro->stock }}
									</td>
									<td class="align-middle">
										<div class="custom-control custom-switch" data-table="producto" data-campo="inicio">
											<input type="checkbox" @if ($pro->inicio) checked @endif class="custom-control-input swiToAj" data-id="{{$pro->id}}" id="swiTo-{{$pro->id}}">
											<label class="custom-control-label" for="swiTo-{{$pro->id}}"></label>
										</div>
									</td>
									<td class="align-middle">
										<div class="custom-control custom-switch" data-table="producto" data-campo="activo">
											<input type="checkbox" @if ($pro->activo) checked @endif class="custom-control-input swiToAj" data-id="{{$pro->id}}" id="AswiTo-{{$pro->id}}">
											<label class="custom-control-label" for="AswiTo-{{$pro->id}}"></label>
										</div>
									</td>
									<td class="align-middle">
										<div class="dropdown text-right">
											{{-- <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</button> --}}
											<a href="" class="btn btn-link btn-sm dropdown py-0" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="{{route('productos.show', $pro->id)}}"><i class="fas fa-info-circle"></i> Ver más</a>
												<a class="dropdown-item" href="{{route('productos.edit', $pro->id)}}"><i class="far fa-fw fa-edit"></i> Editar</a>
												{{-- <a class="dropdown-item" href="#">Eliminar</a> --}}
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#frameModalDel" data-id="{{$pro->id}}"><i class="fas fa-fw fa-trash-alt"></i> Eliminar </button>
											</div>
										</div>
										{{-- <div class="text-right">
											<div class="btn-group btn-group-sm" role="group">
												<a href="" class="btn btn-sm btn-secondary m-0"><i class="fas fa-search-plus"></i></a>
												<button type="button" class="btn btn-sm btn-danger m-0" data-toggle="modal" data-target="#frameModalDel" data-id=""><i class="fas fa-trash-alt"></i></button>
											</div>
										</div> --}}
									</td>
									{{-- <td class="align-middle">
										<a href="" class="btn btn-link btn-sm dropdown"id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v"></i>
										</a>
									  <div class="dropdown-menu dropdown-primary">
									    <a class="dropdown-item" href="#"><i class="fab fa-apple-pay"></i>&nbsp;&nbsp;Pay</a>
									    <a class="dropdown-item" href="#"><i class="fas fa-bell-slash"></i>&nbsp;&nbsp;Disable alertss</a>
									    <a class="dropdown-item" href="#"><i class="far fa-envelope"></i>&nbsp;&nbsp;Check mail</a>
									  </div>
									</td> --}}
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body bg-danger">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2 text-white text-center text-lg-left">
							Eliminar Producto?
							<br>
						{{-- </p>
						<p class="pt-3 pr-2 text-white text-uppercase"> --}}
							<span class=" text-white text-uppercase font-weight-bolder">
								se eliminaran todas las variaciones y existencias relacionadas con este producto
							</span>
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delsize">Eliminar</button>
						<form id="tamdel" action="{{ route('productos.delete') }}" method="POST" style="display: none;">
								@csrf
								<input type="hidden" id="ipdel" name="producto" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
			});

			$('.delsize').click(function(e) {
				$('#tamdel').submit();
			});
		});
	</script>
@endsection
