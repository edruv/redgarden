@extends('layouts.front')

@section('title')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp
@endsection
{{-- @section('title', 'Nosotros') --}}
@section('styleExtras')
	<link rel="stylesheet" href="{{asset('css/carousel.css')}}">
@endsection
@section('cssExtras')
	<style media="screen">
	</style>
@endsection
@section('content')
	<section class="fondotr mb-5">
		<div class="container">
			<div class="row mx-auto">
				<div class="col-12 col-lg-6">
					<div class="bg-rg text-white">

						<div class="fs-3 ps-5 pt-5 fw-bold text-center text-uppercase">
							@if ($envar) About us @else nosotros @endif
						</div>

						<div class="p-5 me-4 text-center">
							{!! $elements[0]->texto !!}

						</div>

					</div>
				</div>

				<div class="col-12 col-lg-6">

					<div class="gallery">
						<div class="gallery-container">
							<img class="gallery-item gallery-item-1" src="{{ asset('img/design/rocks.jpg')}}" data-index="1">
							<img class="gallery-item gallery-item-2" src="{{ asset('img/design/rocks.jpg')}}" data-index="2">
							<img class="gallery-item gallery-item-3" src="{{ asset('img/design/rocks.jpg')}}" data-index="3">
							<img class="gallery-item gallery-item-4" src="{{ asset('img/design/rocks.jpg')}}" data-index="4">
							<img class="gallery-item gallery-item-5" src="{{ asset('img/design/rocks.jpg')}}" data-index="5">
						</div>
						<div class="gallery-controls"></div>
					</div>

					<div class="col-12 row">
						<div class="col-12 col-md-6 text-center">
							<img src="{{ asset('img/design/logo.png')}}" alt="" class="w-75">
						</div>
						<div class="col-12 col-md-6 text-center">
							<img src="{{ asset('img/design/logo-2.png')}}" alt="" class="w-75">
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section>
		<h2 class="text-center text-uppercase m-5 fw-bold" style="font-size:3em;">
			@if ($envar) OUR MANIFESTO @else nuestro manifiesto @endif
		</h2>

		<div class="container">
			<div class="row mx-auto ">
				<div class="col-12 col-lg-3 mx-auto">
					<div class="fs-1 text-uppercase text-center">
						<img src="img/design/vision.png" alt="" class="img-fluid mx-auto">
						<br>
						@if ($envar) Vision @else Visión @endif

					</div>
					<div class="p-2">
						{!! $elements[2]->texto !!}
					</div>
				</div>
				<div class="col-12 col-lg-3 mx-auto">
					<div class="fs-1 text-uppercase text-center">
						<img src="img/design/mision.png" alt="" class="img-fluid mx-auto">
						<br>
						@if ($envar) Mission @else Misión @endif
					</div>
					<div class="p-2">
						{!! $elements[1]->texto !!}
					</div>
				</div>
				<div class="col-12 col-lg-3 mx-auto">
					<div class="fs-1 text-uppercase text-center">
						<img src="img/design/valores.png" alt="" class="img-fluid mx-auto">
						<br>
						@if ($envar) Values @else Valores @endif
					</div>
					<div class="p-2">
						{!! $elements[3]->texto !!}
					</div>
				</div>

			</div>
		</div>

	</section>
@endsection

@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
		});

	</script>
@endsection
