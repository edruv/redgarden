@extends('layouts.front')

@section('title', 'Inicio')
@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/index.css')}}">
	<link rel="stylesheet" href="{{ asset('vendor/owlCarousel2/assets/owl.carousel.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.theme.default.min.css') }}"> --}}
@endsection
@section('styleExtras')
	<style media="screen">
		.carousel-control-next,
		.carousel-control-prev {
			width: 7.5%;
		}

		.carousel-caption {
			left: 7.5%;
			right: 7.5%;
		}

		.ytp-chrome-controls {
			margin: auto 8% !important;
		}

	</style>
@endsection
@section('content')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp

	<section>
		<div id="sliders" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($carrusel as $car)
					<button type="button" data-bs-target="#sliders" data-bs-slide-to="{{ $loop->index }}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide {{ $loop->index }}"></button>
				@endforeach
			</div>
			<div class="carousel-inner">
				@foreach ($carrusel as $item)
					<div class="carousel-item @if ($loop->index == 0 ) active @endif">
						@if ($item->image)
							<img src="{{ asset('img/photos/sliders/'.$item->image) }}" class="d-block w-100" alt="{{ $item->image }}">
						@else
							<div class="embed-responsive embed-responsive-21by9">
								<iframe class="d-block w-100" style="height:600px;" src="https://www.youtube.com/embed/{{$item->video['idVideo']}}?rel=0" allowfullscreen></iframe>
								</video>
							</div>
						@endif
					</div>
				@endforeach
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#sliders" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#sliders" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	</section>
	<section>
		<div id="carousel-alerts" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="d-block w-100 bg-rg carousel-alert">
						<div class="col-9 mx-auto py-3 text-center">
							Lorem ipsum dolor sit
							amet, consectetur adipisicing elit. Vero est dolorum amet, nisi facere a, tenetur culpa
							repellat temporibus tempore!
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="d-block w-100 bg-rg carousel-alert">
						<div class="col-9 mx-auto py-3 text-center">
							Lorem ipsum dolor sit
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="d-block w-100 bg-rg carousel-alert">
						<div class="col-9 mx-auto py-3 text-center">
							Lorem ipsum dolor sit
						</div>
					</div>
				</div>
			</div>
			<!-- <button class="carousel-control-prev" type="button" data-bs-target="#carousel-alerts" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carousel-alerts" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button> -->
		</div>
	</section>

	<section>
		<div class="row mx-auto pt-5">
			<div class="col-12 col-md-8">
				<div class="col-12 row">
					<div class="col-12 col-md-6 text-center">
						<img src="img/design/logo.png" alt="" class="">
					</div>
					<div class="col-12 col-md-6 text-center">
						<img src="img/design/logo-2.png" alt="" class="">
					</div>
				</div>
				<div class="col-12">
					<div class="owl-carousel owl-one">
						@foreach ($servDesta as $serv)
							<div class="">
								<a href="{{ route('front.servicioDet',$serv->id) }}">
									<img src="{{ asset('img/photos/servicios/'.$serv->photo) }}" class="card-img-top" alt="{{$serv->photo}}">
								</a>
								<div class="card-body text-center">
									{{-- <a href="{{ route('front.servicioDet',$serv->id) }}" class="card-title h4">{{ (Session::get('lang') == 'es') ? $serv->nombre : $serv->nombre}}</a> --}}
									<a href="{{ route('front.servicioDet',$serv->id) }}" class="card-title h4">{{ $serv->{'nombre'.$envar} }}</a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<div class="">
					<p class="fs-2">@if ($envar) Our Commitment @else Nuestro Compromiso @endif </p>
					<div class="">
						{!! $elements[0]->texto !!}
					</div>
				</div>
				<div class="pt-5">
						<div class="row">
							<div class="col-3 text-center">
								<img src="{{ asset('img/design/logo-jal.png') }}" alt="logo-jal.png" class="img-fluid w-75">
							</div>
							<div class="col-9">
								<p class="h5">@if ($envar) CERTIFICATION @else CERTIFICACIÓN @endif</p>
								{!! $elements[1]->texto !!}
							</div>
						</div>
				</div>
			</div>
		</div>
	</section>

	<section class="fondotr">

		<div class="row mx-auto">
			<div class="col-12 col-md-6">
				<div class="text-center">
					<img class="rounded-circle p-2 img-fluid" src="{{ asset('img/photos/seccions/'. $elements[3]->imagen) }}" alt="">
				</div>
				<div class="text-center mb-5">
					{{-- <img src="/recursos/images/home_15.png" alt=""> --}}
				</div>
			</div>

			<div class="col-12 col-md-6 align-self-center">
				<div class="pt-5 p-2 ">
					<img src="img/design/logo.png" alt="" class="">
				</div>
				<div>
					{!! $elements[2]->texto !!}
				</div>
				<button type="button" class="btn mt-3 rounded-pill fw-bold py-3 text-white" style="background-color: #006532;"
					data-mdb-ripple-color="dark"> @if ($envar) MORE @else VER MÁS @endif</button>
			</div>
		</div>

		<div class="row mx-auto">
			<div class="col-12 col-lg-5 mx-auto">
				<div class="mx-auto text-center">
					<div class="fs-1 text-uppercase fw-bold">
						@if ($envar) STORE @else TIENDA @endif
					</div>
					<div class="">
						{!! $elements[4]->texto !!}
					</div>
				</div>
			</div>
		</div>

		<!-- Separación con flor -->

		<div class="sep my-3">
			<hr>
			<img src="img/design/stone_r.png" alt="">
		</div>

		<!-- Linea de separación con texto -->
		<div style="background-color:#006532;color:#fff;">
			<div class="p-2 fs-2 text-center text-uppercase fw-bold">
				@if ($envar) Newest products @else Lo más nuevo @endif
			</div>
		</div>
	</section>
	<!-- Fondo pegado a la esquina superior derecha -->
	<section class="fondotl">

		<!-- Hover en el cual me tarde 3 horas, usenlo por favor -->

		<div class="container-md pt-5 mx-auto">
			<div class="owl-carousel owl-two">
				@foreach ($desta as $dest)
					<div class="">
						<div class="category mb-5 shadow-lg  bg-body rounded">
							<div class="htcatthumb ">
								<a href="{{ route('front.details',$dest->id) }}">
									<img class="img-fluid" style="object-fit: cover;height:350px;" src="{{ asset('img/photos/productos/'.$dest->photo)}}" alt="{{$dest->photo}}">
								</a>
							</div>

							<div class="text-center text-uppercase py-3" style=" background-color: #006532; color:#fff; opacity: 75%;">
								{{ $dest->{'nombre'.$envar} }}
								<hr class="fw-bold mx-auto " style="width: 30%;  ">
								{{-- <div> <s>$700.00</s> $300.00 </div> --}}
							</div>

							<div class="frproductinner innerposition text-center" style="background-color: #006532; color:#fff;">
								<i class="fas fa-2x fa-shopping-bag"></i>
								<hr class="mx-auto" style="width: 30%;">
								<h4>
									<a href="{{ route('front.details',$dest->id) }}" class="text-white">@if ($envar) See details @else Ver detalles @endif </a>
								</h4>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

		<div class="text-center">
			<a href="{{ route('front.productos') }}" class="btn btn-rounded fw-bold py-2" style="background-color: #006532;color:#fff;">@if ($envar) STORE @else TIENDA @endif</a>
			{{-- <button type="button" class="btn  btn-rounded fw-bold py-2" style="background-color: #006532;color:#fff;">@if ($envar) STORE @else TIENDA @endif</button> --}}
		</div>

		<!-- La sección termina aquí para abarcar el fondo -->
	</section>

@endsection

@section('jsLibExtras2')
	<script type="text/javascript" src="{{asset('vendor/owlCarousel2/owl.carousel.js')}}"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
	$(document).ready(function () {
		// $('.carousel').carousel({
		//   interval: 0
		// });
		$('.owl-one').owlCarousel({
				loop:true,
				margin:10,
				responsiveClass:true,
				responsive:{
						0:{
								items:1,
								nav:true
						},
						600:{
								items:3,
								nav:false
						}
				}
		});

		$('.owl-two').owlCarousel({
				loop:true,
				margin:20,
				responsiveClass:true,
				responsive:{
						0:{
								items:1,
								nav:true
						},
						600:{
								items:4,
								nav:false
						}
				}
		});
	});
	</script>
@endsection