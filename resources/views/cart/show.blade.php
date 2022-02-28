@extends('layouts.front')

@section('title', 'Carrito')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
@section('styleExtras')
	<style media="screen">
		tbody tr td {
			vertical-align: middle!important;
		}
	</style>
@endsection
@section('content')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp
<section>
	<div class="bg-global">
		<div class="col-12 p-3 text-center" style="background-color: black; color: white;">
			<div class="d-inline" style="font-size:24px;color: white;">Mi Carrito</div>
		</div>
	</div>
</section>
	<div class="container my-5">
		@if ( !count($carrito) )
		<div class="col-12 center-y-x"  style="
			min-height:55vh;
			width:100%;
		    display: flex;
		    align-items: center;
		    justify-content: center;">
			<div class="col-12 alert alert-danger text-center" role="alert">
				<b>El carro está vacío</b></div>
		</div>
		@else
		<div class="col-md-9 mx-auto">
			<form class="card" method="post">
				<h3 class="card-header text-center">@if ($envar) Products and details: @else  Productos y detalles: @endif</h3>
				<div class="">
					<table class="table table-sm">
						<thead>
							<tr>
								<th width="50px"></th>
								<th>@if ($envar) PRODUCT @else PRODUCTO @endif</th>
								<th>@if ($envar) SIZE @else TAMAÑO @endif</th>
								<th>@if ($envar) PRESENTATION @else PRESENTACION @endif</th>
								<th width="50px">@if ($envar) QUANTITY @else CANTIDAD @endif</th>
								<th class="text-center" width="100px">@if ($envar) P. Unit @else P. Unit @endif</th>
								<th width="100px">@if ($envar) AMOUNT @else IMPORTE @endif</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($carrito as $item)
									<tr class="">
										<td class="text-center">
											<button type="button" class="btn btn-sm btn-outline-danger removecart " data-id="{{$item->id}}" style="width: 3em;height: 2em;padding: 0;">
												<i class="fas fa-trash"></i>
											</button>
										</td>
										{{-- <td>
											<div class="uk-cover-container uk-border-circle" style="width:40px;height:40px;">
												<img src="img/design/camara.jpg" uk-cover="" class="uk-cover" style="height: 40px; width: 40px;">
											</div>
										</td> --}}
										<td class="text-left text-uppercase" >
											<a href="{{route('front.details',$item->associatedModel['id'])}}" >{{ $item->attributes['producto']['nombre'.$envar] }}</a>
										</td>
										<td class="text-left text-uppercase" >
											{{ $item->attributes['size']['tamanio'.$envar] }}
										</td>
										<td class="text-left text-uppercase" >
											{{ $item->attributes['presentacion']['tamanio'.$envar] }}
										</td>
										<td class="text-right">
											<input type="number" name="cantidad" value="{{$item->quantity}}" min="1" data-key="{{$item->id}}" class="cantidad form-control " tabindex="10">
										</td>
										<td class="text-center">
											@php
												$fprice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
											@endphp
											{{ number_format($fprice,2)}}
										</td>
										<td class="text-left">
											{{ number_format(($fprice*$item->quantity),2)}}
										</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="6" class="text-right font-weight-bold">Subtotal:</td>
									<td>{{ number_format($cuentas['subtotal'],2) }}</td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td class="text-right font-weight-bold">@if ($envar) TAX: @else IVA: @endif</td>
									<td>{{ number_format($cuentas['iva'],2) }}</td>
								</tr>
								<tr>
									<td colspan="5"></td>
									<td class="text-right font-weight-bold">@if ($envar) Total: @else Total: @endif</td>
									<td>{{ number_format($cuentas['total'],2) }}</td>
								</tr>
						</tbody>
					</table>
				</div>
			</form>
			<div class="my-3">
				<div class="">
					<div class="row">
						<a href="{{ url()->route('front.productos') }}" class="col mx-auto col-md-3 btn btn-sm btn-default border"><i class="fas fa-fw fa-arrow-left"></i> @if ($envar) Continue shopping @else  Seguir comprando @endif</a>
						<a href="{{ route('cart.emptycart')}}" class="col mx-auto col-md-3 btn btn-sm btn-default border"><i class="fas fa-fw fa-trash"></i> @if ($envar) Empty cart @else  Vaciar carrito @endif</a>
						<a href="{{ route('cart.confirm') }}" class="col mx-auto col-md-3 btn btn-sm btn-info ">@if ($envar) Continue to @else Continuar @endif <i class="fas fa-fw fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		@endif
	</div>

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
$(document).ready(function() {
	$('.cantidad').change(function(e) {
		var key = $(this).data('key');
		var cant = $(this).val();
		var price = $('#price-'+key).data('num');
		var final = $('#final-'+key).data('num');
		var desc = $('#final-'+key).data('desc');
		var importe = $('#imp-'+key).data('num');
		var subt = $('#subtotal').data('num');
		var total = $('#total').data('num');

		$.ajax({
			url: '/varios/updatecart',
			data: {
				item: key,
				cant: cant
			}
		})
		.done(function(resp) {
			if (resp.resp) {
				window.location.reload();
			}
		})
		.fail(function(resp) {
			console.log("error: "+resp);
		});

	});
});
</script>
@endsection
