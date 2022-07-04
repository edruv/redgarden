@extends('layouts.front')

@section('title', 'Productos')

{{-- @section('styleExtras') @endsection --}}

@section('content')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp
	<section class="fondotr">
		<div class="row mx-auto">
			<div class="col-12 col-lg-5 mx-auto">
				<div class="mx-auto text-center">
					<div class="fs-1 fw-bold mt-5">
						@if ($envar) STORE @else TIENDA @endif
					</div>
					<div class="">
						{!! $elements[0]->texto !!}

					</div>
				</div>
			</div>
		</div>

		<div class="sep my-3">
			<hr>
			<img src="img/design/stone_r.png" alt="">
		</div>

		<div class="d-sm-flex justify-content-evenly fw-bold">
			@foreach ($cats as $cat)
				<div class="text-center">
					<a href="{{ route('front.productos',$cat->slug) }}">
						@if (!empty($cat->portada))
							<img src="{{ asset('img/photos/categorias/'.$cat->portada)}}" class="card-img-top rounded-circle img-fluid" alt="" style="width:12em;height:12em">
						@else
							<img src="{{ asset('img/design/social2.png')}}" class="card-img-top rounded-circle img-fluid" alt="" style="width:12em;height:12em">
						@endif
					</a>
					<div class="card-body text-center">
						<a href="{{ route('front.productos',$cat->slug) }}">
							<h5 class="card-title text-uppercase">{{ $cat->{'nombre'.$envar} }}</h5>
						</a>
					</div>
				</div>
			@endforeach
		</div>

		@if ($slug)
			<div class="text-center py-4 text-uppercase" style="color: #006532; font-size:3em;">
				{{ $slug }}
			</div>
		@endif

		<div class="container">
			<div class="row">
				@foreach ($products as $prod)
					<div class="col-12 col-md-3">
						<div class="category my-3 shadow-lg  bg-body rounded">
							<div class="htcatthumb ">
								<a href="{{ route('front.details',$prod->id) }}">
									<img class="img-fluid" style="object-fit: cover;height:350px;" src="{{ asset('img/photos/productos/'.$prod->photo)}}" alt="{{$prod->photo}}">
								</a>
							</div>

							<div class="text-center text-uppercase py-3" style=" background-color: #006532; color:#fff; opacity: 75%;">
								{{ $prod->{'nombre'.$envar} }}
								<hr class="fw-bold mx-auto " style="width: 30%;  ">
								{{-- <div> <s>$700.00</s> $300.00 </div> --}}
								<div> $N/A </div>
							</div>

							<div class="frproductinner innerposition text-center" style="background-color: #006532; color:#fff;">
								<i class="fas fa-2x fa-shopping-bag"></i>
								<hr class="mx-auto" style="width: 30%;">
								<h4><a href="{{ route('front.details',$prod->id) }}" class="text-white">Ver detalle</a></h4>
							</div>
						</div>
					</div>
				@endforeach

			</div>
		</div>




		</div>


	</section>
@endsection

{{-- @section('jsLibExtras2') @endsection --}}

@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {

		});
	</script>
@endsection
