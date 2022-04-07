@extends('layouts.front')

@section('title')
	@php
	$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp

	@if ($envar) SERVICES @else SERVICIOS @endif
@endsection

{{-- @section('styleExtras') @endsection --}}

@section('content')

	<section style=" background: #006532; background: linear-gradient(180deg, #006532 40%, rgba(255,255,255,1) 40%);">

		<h1 class="text-center text-uppercase py-4 text-white">@if ($envar) OUR SERVICES @else Nuestros servicios @endif </h1>

		<div class="container">
			<div class="row">
				@foreach ($services as $serv)
					<div class="col-12 col-md-4 pb-3">
						<a href="{{ route('front.servicioDet',$serv->id) }}">
							@if ($serv->photo)
								<img src="{{ asset('img/photos/servicios/'.$serv->photo) }}" class="card-img-top" alt="{{$serv->photo}}">
							@else
								<img src="{{ asset('img/design/social.png')}}" class="card-img-top text-center" alt="social.png" style="height: 15em;object-fit: cover;">
							@endif
						</a>
						<div class="p-2 text-center">
							<a href="{{ route('front.servicioDet',$serv->id) }}" class="card-title h5 text-uppercase">{{ $serv->{'nombre'.$envar} }}</a>
						</div>
					</div>
				@endforeach

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
