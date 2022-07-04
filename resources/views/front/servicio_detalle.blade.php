@extends('layouts.front')

@section('title')
	@php
	$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp

	@if ($envar) SERVICES @else SERVICIOS @endif
@endsection

{{-- @section('styleExtras') @endsection --}}

@section('content')

	{{-- <section style=" background: #006532; background: linear-gradient(180deg, #006532 40%, rgba(255,255,255,1) 40%);">

		<h1 class="text-center text-uppercase py-4 text-white">@if ($envar) OUR SERVICES @else Nuestros servicios @endif </h1>

		<div class="container">
			<div class="row">
				@foreach ($services as $serv)
					<div class="col-12 col-md-4 pb-3">
						<a href="{{ route('front.servicioDet',$serv->id) }}">
							@if ($serv->photo)
								<img src="{{ asset('img/photos/servicios/'.$serv->photo)}}" class="card-img-top" alt="{{$serv->photo}}">
							@else
								<img src="{{ asset('img/design/social.png')}}" class="card-img-top text-center" alt="social.png">
							@endif
						</a>
						<div class="p-2 text-center">
							<a href="{{ route('front.servicioDet',$serv->id) }}" class="card-title h5 text-uppercase">{{ $serv->{'nombre'.$envar} }}</a>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</section> --}}

	<section style=" background: url({{asset('img/design/menu_bg.png')}}); background: linear-gradient(180deg, #006532 40%, rgba(255,255,255,1) 40%);">

		<div class="text-center text-uppercase py-4 text-white h1" style="padding-top:2em !important;">@if ($envar) OUR SERVICES @else Nuestros servicios @endif </div>

		<div class="container">
			<div class="card">
				<div class="row">
					<div class="col-12 col-md-5">
						<div id="carouselItem" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								@if ($serv->gallery->count())
									@foreach ($serv->gallery as $item)
										<div class="carousel-item @if ($loop->first) active @endif">
											<img src="{{ asset('img/photos/servicios/'.$item->image) }}" class="d-block w-100" alt="{{$item->image}}">
										</div>
									@endforeach
								@else
									<div class="carousel-item active">
										<img src="{{ asset('img/design/social.png')}}" class="d-block w-100" alt="social.png">
									</div>
								@endif
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselItem" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselItem" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
					<div class="col-12 col-md-7">
						<div class="card-body">
							<h5 class="card-title text-center text-uppercase fw-bold">{{ $serv->{'nombre'.$envar} }}</h5>
							<hr class="mx-auto w-50">
							<div class="card-text">
								{!! $serv->{'descripcion'.$envar} !!}
							</div>
							<div class="text-center mt-3">
								<a href="https://wa.me/52{{$config->whatsapp}}" class="btn btn-outline-dark rounded-pill">AGENDAR</a>
							</div>
						</div>
					</div>
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
