@extends('layouts.front')

@section('title', 'Contacto')
{{-- @section('cssExtras')@endsection --}}
@section('styleExtras')
	<style media="screen">
	.btn-whatsapp{
		background: #25d366 !important;
		color: #fff;
		font-size: 1.5em;
		border: 4px #eeeeee solid;
		border-radius: .5em;
	}
	#mapa iframe{
		height: 400px;
		width: 100%;
	}
	.form-group {
  margin-bottom: .5rem;
}

.form-inline .form-control {
  display: inline-block;
  width: auto;
  vertical-align: middle;
}

.form-row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -5px;
  margin-left: -5px;
}

label {
  margin-bottom: 0.5rem;
}
	</style>
@endsection
@section('content')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp

		<section class="pb-5 text-white" style="background-image: url('img/design/menu_bg.png');">




 <div class="fondotr">



 	<h2 class="p-5 text-center text-uppercase fw-bold"> @if ($envar) WE ARE HERE TO SERVE YOU @else estamos para servirte @endif  </h2>



 	<div class="container">
 		<div class="centered">

 			<form>

 				<!-- 2 column grid layout with text inputs for the first and last names -->
 				<div class="row ">
 					<div class="col">
 						<div class="">
 							<input type="text" id="form6Example1" class="form-control" placeholder="Nombre" />
 							<label class="form-label" for="form6Example1"></label>
 						</div>
 					</div>
 					<div class="col">
 						<div class="">
 							<input type="tel" id="form6Example2" class="form-control" placeholder="Whatsapp" />
 							<label class="form-label" for="form6Example2"></label>
 						</div>
 					</div>
 				</div>

 				<div class="row ">
 					<div class="col">
 						<div class="">
 							<input type="tel" id="form6Example1" class="form-control" placeholder="Teléfono" />
 							<label class="form-label" for="form6Example1"></label>
 						</div>
 					</div>
 					<div class="col">
 						<div class="">
 							<input type="email" id="form6Example2" class="form-control" placeholder="Correo" />
 							<label class="form-label" for="form6Example2"></label>
 						</div>
 					</div>
 				</div>

 				<!-- Message input -->
 				<div class=" ">
 					<textarea class="form-control" id="form6Example7" rows="4" placeholder="Mensaje"></textarea>
 					<label class="form-label" for="form6Example7"></label>
 				</div>

 				<!-- Submit button -->

 				<div class="d-flex justify-content-center ">
 					<button type="button" class="btn btn-outline-light rounded-pill" data-mdb-ripple-color="dark">
						@if ($envar) Send @else Enviar @endif

 					</button>
 				</div>
 			</form>

 		</div>
 	</div>

 </div>

 <h2 class="m-5 text-center text-uppercase fw-bold"> @if ($envar) FIND US @else Encuentranos @endif </h2>


 <div class="container">

 	<div class="row mx-auto">
 		<div class="col-12 col-md-4">
 			<div class="text-uppercase text-center fw-bold"> G force</div>
 			<hr class="" style="color: #fff; height: .2em; opacity: .9; width: 90%;">
 			<!-- lista sin estilo -->
 			<div class="row">
 				<div class="col-12">
 					Lorem ipsum dolor sit amet,<br>
 					consectetur adipisicing elit. <br>
 					Eveniet, harum.
 				</div>
 			</div>
 		</div>
 		<div class="col-12 col-md-8">
 			<div class="text-uppercase text-center fw-bold"> red garden</div>
 			<hr class="" style="color: #fff; height: .2em; opacity: .9; width: 90%;">
 			<!-- lista sin estilo -->
 			<div class="row">
 				<div class="col-12 col-md-6">
 					Lorem ipsum dolor sit amet,<br>
 					consectetur adipisicing elit. <br>
 					Eveniet, harum.
 				</div>
 				<div class="col-12 col-md-6">
 					Lorem ipsum dolor sit amet,<br>
 					consectetur adipisicing elit. <br>
 					Eveniet, harum.
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 </section>

 <!-- mapa -->
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.672671489009!2d-103.39868998460146!3d20.64219480623701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1ses-419!2smx!4v1639351855265!5m2!1ses-419!2smx" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
@endsection

@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
	</script>
@endsection
