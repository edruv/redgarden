@extends('layouts.front')

@section('title', 'Productos')

{{-- @section('styleExtras') @endsection --}}

@section('content')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp

	<section class="fondotr">

		<div class="sep pt-3">
			<hr>
			<img src="{{ asset('img/design/stone_r.png')}}" alt="stone_r.png">
		</div>
		<div class="container">
			<div class="centered">
				<div class="card col-12 col-lg-6" style="">
					<div class="card-img-top">
						<div id="carouselItem" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								@foreach ($product->gallery as $itemgal)
									<div class="carousel-item @if ($loop->first) active @endif">
										<img src="{{ asset('img/photos/productos/'.$itemgal->image)}}" class="d-block img-fluid mx-auto" style="height:500px;object-fit: cover;" alt="{{$itemgal->image}}">
									</div>
								@endforeach
							</div>
							@if ($product->gallery->count() > 1)
								<button class="carousel-control-prev" type="button" data-bs-target="#carouselItem" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#carouselItem" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							@endif
						</div>
					</div>
					<!-- <img class="" src="img/design/producto-1.png" class="card-img-top" alt="..."> -->
					<div class="card-body" style="background-color:#009e5c;">
						<h5 class="card-title text-center text-uppercase fw-bold fs-1" style="color:#000;">
							{{ $product->{'nombre'.$envar} }}
						</h5>
						<hr class="w-25 mx-auto" style="border-top: .1em solid #fff; border-bottom: .1em solid #fff; opacity:1;">
						<div class="card-text fs-5" style="color:#000;">
							{!! $product->{'descripcion'.$envar} !!}
						</div>
						<div class="mt-3">
							{{-- <form action=""> --}}
								<div class="row">
									<div class="col-12 mb-3">
										{{-- <label class="form-label" for="size"> @if ($envar) STONE SIZE @else TAMAÑO DE PIEDRA @endif </label> --}}
										<label class="form-label" for="size"> @if ($envar) STONE SIZE & PRESENTATION @else TAMAÑO DE PIEDRA & PRESENTACION @endif </label>
										<select name="size" id="size" class="form-select btn btn-outline-dark" required>
											<option disabled selected>@if ($envar) Select an option @else Seleccionar @endif</option>
												@foreach ($variantes as $var)
													<option value="{{$var->id}}">{{$var->size->{'tamanio'.$envar} }} - {{$var->presentacion->{'tamanio'.$envar} }}</option>
												@endforeach
										</select>
									</div>
									{{-- <div class="col-12 col-md">
										<label class="form-label" for=""> @if ($envar) PRESENTATION @else PRESENTACION @endif </label>
										<select name="" id="" class="form-select btn btn-outline-dark">
											<option disabled selected>@if ($envar) Select an option @else Seleccionar @endif</option>
											<option value=""></option>
											<option value=""></option>
										</select>
									</div> --}}
									<div class="col-12 mb-3">
										<label class="form-label" for=""> @if ($envar) QUANTITY @else CANTIDAD @endif </label>
										<input type="number" name="cantidad" id="cantidad" class="form-control btn btn-outline-dark" max="">
									</div>
									<div class="col-12 text-center py-3">
										<button class="btn btn-outline-light addtocart">@if ($envar) buy @else Comprar @endif </button>
									</div>
								</div>
							{{-- </form> --}}
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	@if (!empty($prodRel->count()))
		<section>

			<div class="container">
				<h2 class="mt-5 text-center text-uppercase fw-bold"> @if ($envar) YOU MAY ALSO BE INTERESTED @else También puede interesarte @endif </h2>

					<div class="container py-4 mx-auto">
						<div class="row">
							@foreach ($prodRel as $pr)
								<div class="col-6 col-md-3">
									<div class="category mb-5 shadow-lg  bg-body rounded">
										<div class="htcatthumb ">
											<a href="{{ route('front.details',$pr->id) }}">
												<img class="img-fluid" style="object-fit: cover;height:350px;" src="{{ asset('img/photos/productos/'.$pr->photo)}}" alt="{{$pr->photo}}">
											</a>
										</div>

										<div class="text-center text-uppercase py-3" style=" background-color: #006532; color:#fff; opacity: 75%;">
											{{ $pr->{'nombre'.$envar} }}
											<hr class="fw-bold mx-auto " style="width: 30%;  ">
											{{-- <div> <s>$700.00</s> $300.00 </div> --}}
										</div>

										<div class="frproductinner innerposition text-center" style="background-color: #006532; color:#fff;">
											<i class="fas fa-2x fa-shopping-bag"></i>
											<hr class="mx-auto" style="width: 30%;">
											<h4>
												<a href="{{ route('front.details',$pr->id) }}" class="text-white">@if ($envar) See details @else Ver detalles @endif </a>
											</h4>
										</div>
									</div>
								</div>
							@endforeach

						</div>
					</div>
				</div>
			</section>
	@endif
@endsection

{{-- @section('jsLibExtras2') @endsection --}}

@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			// $('.carousel').carousel({
			// });
			$('#size').change(function(e) {
				var sizeId = $(this).val();
				var tcsrf = $('meta[name="csrf-token"]').attr('content');

				$.ajax({
					url: '/producto/det/var',
					data: {
						"_method": 'post',
						"_token": tcsrf,
						'variante': sizeId
					}
				})
				.done(function(resp) {
					if (resp != 401) {
						let stock = resp.stock;
						if (stock > 0 ) {
							$('.addtocart').removeClass('disabled');
							$('#cantidad').attr('max', stock);
							$('#cantidad').val(1);
						} else {
							$('#cantidad').val(0);
							$('.addtocart').addClass('disabled');
						}
					} else {
						console.log(resp);
						@if ($envar)
						toastr["error"]("Error when consulting product ");
						@else
						toastr["error"]("Error al consultar producto");
						@endif
					}
				})
				.fail(function(resp) {
					console.log("error");
					console.log(resp);
				});

			});
		});
	</script>
@endsection
