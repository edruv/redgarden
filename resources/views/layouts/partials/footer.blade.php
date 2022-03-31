<footer>
	@php
		switch (Session::get('lang')) {
			case 'en':
				$ftadp = 'PRIVACY NOTICE';
				$fttyc = 'TERMS AND CONDITIONS';
				$ftpde = 'SHIPPING POLICIES';
				$ftmc = 'MY ACCOUNT';
			break;
			default:
				$ftadp = 'AVISO DE PRIVACIDAD';
				$fttyc = 'TÉRMINOS Y CONDICIONES';
				$ftpde = 'POLÍTICAS DE ENVÍO';
				$ftmc = 'MI CUENTA';
			break;
		}
	@endphp
	<div class="sep my-3">
		<hr>
		<img src="{{ asset('img/design/stone_r.png') }}" alt="">
	</div>
	<div class="my-3 row mx-auto">
		<div class="col-6 text-center"><img src="{{ asset('img/design/bio.png') }}" alt="" class="img-fluid"></div>
		<div class="col-6 text-center"><img src="{{ asset('img/design/mexico.png') }}" alt="" class="img-fluid"></div>
	</div>
	<div class="container">
		<div class="row mx-auto">
			<div class="col-12 col-lg-4">
				<div class="text-uppercase fw-bold"> Navegación</div>
				<hr class="" style="color: #006532; height: .4em; opacity: .8; width: 90%;">
				<!-- lista sin estilo -->
				<ul class="list-unstyled">
					<li><a class="text-uppercase" href="{{ route('front.index') }}">{{ $hftindex }}</a></li>
					<li><a class="text-uppercase" href="{{ route('front.servicios') }}">{{ $hftservices }} </a></li>
					<li><a class="text-uppercase" href="{{ route('front.aboutus') }}">{{ $hftabout }}</a></li>
					<li><a class="text-uppercase" href="{{ route('front.productos') }}">{{ $hftstore }}</a></li>
				</ul>
			</div>

			<div class="col-12 col-lg-4">
				<div class="text-uppercase fw-bold"> Ayuda</div>
				<hr class="" style="color: #006532; height: .4em; opacity: .8; width: 90%;">
				<!-- lista sin estilo -->
				<ul class="list-unstyled">
					<li><a href="{{ route('front.faq') }}">FAQ</a></li>
					<li><a href="{{ route('front.aviso') }}">{{$ftadp}}</a></li>
					<li><a href="{{ route('front.tyc') }}">{{$fttyc}}</a></li>
					<li><a href="{{ route('front.pde') }}">{{$ftpde}}</a></li>
				</ul>
			</div>

			{{-- <div class="col-12 col-lg-6">
				<div class="text-uppercase fw-bold"> red garden</div>
				<hr class="" style="color: #006532; height: .4em; opacity: .8; width: 90%;">
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
			</div> --}}
			<div class="col-12 col-lg-4">
				<div class="text-uppercase fw-bold"> Social</div>
				<hr class="" style="color: #006532; height: .4em; opacity: .8; width: 90%;">
				<ul class="list-unstyled">
					<li><a class="text-uppercase" href="{{ route('front.contacto') }}">{{ $hftcontact }}</a></li>
					<li><a href="/login"> {{$ftmc}} </a></li>
					<li><a href="{{$config->facebook}}"> FACEBOOK </a></li>
					<li><a href="{{$config->instagram}}"> INSTAGRAM </a></li>
				</ul>

		</div>

	</div>

	<div style="background-color:#006532;">
		<div class="p-2 fs-3 text-center">
			<div>
				<a href="{{ $config->whatsapp}}" class="text-white">
					<i class="fab mx-2 fa-whatsapp"></i>
				</a>
				<a href="{{ $config->instagram}}" class="text-white">
					<i class="fab mx-2 fa-instagram"></i>
				</a>
				<a href="{{ $config->facebook}}" class="text-white">
					<i class="fab mx-2 fa-facebook"></i>
				</a>
				<a href="{{ $config->youtube}}" class="text-white">
					<i class="fab mx-2 fa-youtube"></i>
				</a>
			</div>
		</div>
	</div>

	<div style="background-color:white;">
		<div class="text-center p-2" style="font-size: .8em;">
			TODOS LOS DERECHOS RESERVADOS G FORCE / REDGARDEN DISEÑO POR WOZIAL MARKETING LOVERS
		</div>
	</div>

</footer>
