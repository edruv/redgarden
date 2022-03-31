<header>
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
	<nav class="navbar navbar-light" aria-label="First navbar example">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#menuModal">
				<i class="fas fa-bars"></i>
			</button>
			<a class="navbar-brand" href="{{ route('front.index') }}">
				<img src="{{asset('img/design/logo.png')}}" alt="logo.png" class="img-fluid" style="height:4em;">
			</a>
			<div class="d-flex justify-content-evenly">
				<div>
					<a href="tel:{{$config->telefono}}" class="btn btn-outline-light btn-sm text-dark fw-bold">Tel: {{$config->telefono}}</a>
				</div>
				<div>
					@guest
						<a class="btn btn-outline-light btn-sm text-dark" href="{{ route('login') }}">
							<div class="">
								{{ __('Iniciar Sesión') }}
							</div>
						</a>
						{{-- @if (Route::has('register'))
							<a class="btn btn-outline-light btn-sm text-dark" href="{{ route('register') }}">
								<div class="">
									{{ __('Registrarse') }}
								</div>
							</a>
						@endif --}}
					@else
						<div class="col-5 col-lg-5 mx-auto">
							<a class="btn btn-outline-light btn-sm text-dark m-0 p-1 justify-content-center d-flex justify-content-rigth" href="{{url('/dashboard')}}" style="color:orange">
								{{ Auth::user()->name }} <i class="far fa-user-circle fa-fw fa-2x ps-1"></i>
							</a>
						</div>
					@endguest
				</div>
				<div>
					@if (Session::get('lang') == 'es')
						<button type="button" class="btn btn-outline-light btn-sm text-dark lang" data-lang="en">EN</button>
					@else
						<button type="button" class="btn btn-outline-light btn-sm text-dark lang" data-lang="es">ES</button>
					@endif
				</div>
				<div>
					<a href="{{ route("cart.show") }}" class="btn btn-outline-light btn-sm text-dark"><i class="fas fa-shopping-cart"></i></a>
				</div>
			</div>
			<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-fullscreen">
					<div class="modal-content">
						<div class="container-fluid">
							<div class="row  py-2">
								<div class="col">
									<div class="row d-flex align-items-center">
										<div class="col line-white"></div>
										<img src="{{asset('img/design/stone_b.png')}}" alt="" class="col-2 col-lg-1 text-center">
										<div class="col line-white"></div>
									</div>
								</div>
								<div class="col-1 text-center d-flex align-items-center justify-content-center">
									<button type="button" class="btn btn-light" data-bs-dismiss="modal"
										aria-label="Close"><i class="fa fa-2x fa-times"></i> </button>
								</div>
							</div>
						</div>
						<div class="modal-body" >
							<div class="">
								<div class="text-white" style="font-size:15px">
									{!!$hftcitas!!}: <br>
									<a class=" text-white" href="tel:{{$config->telefono}}"style="font-size:15px">{{$config->telefono}}</a> <br>
									<a class=" text-white" href="tel:{{$config->telefono2}}"style="font-size:15px">{{$config->telefono2}}</a> <br>
								</div>
							</div>
							<ul class="list-unstyled text-center">
								<li class=""><a href="{{ route('front.index') }}" class="text-white fw-bold text-uppercase">{{$hftindex}}</a></li>
								<li class=""><a href="{{ route('front.productos') }}" class="text-white fw-bold text-uppercase">{{$hftstore}}</a></li>

								<li class=""><a href="{{ route('front.servicios') }}" class="text-white fw-bold text-uppercase">{{$hftservices}}</a></li>
								<li class=""><a href="{{ route('front.aboutus') }}" class="text-white fw-bold text-uppercase">{{$hftabout}}</a></li>
								<li class=""><a href="{{ route('front.contacto') }}" class="text-white fw-bold text-uppercase">{{$hftcontact}}</a></li>

								<li class="">
									<a href="{{ $config->whatsapp}}" target="_blank" class="px-1 text-white"><span class="fab fa-whatsapp"></span></a>
									<a href="{{ $config->instagram}}" target="_blank" class="px-1 text-white"><span class="fab fa-instagram"></span></a>
									<a href="{{ $config->facebook}}" target="_blank" class="px-1 text-white"><span class="fab fa-facebook"></span></a>
									<a href="{{ $config->youtube}}" target="_blank" class="px-1 text-white"><span class="fab fa-youtube"></span></a>
								</li>
							</ul>
							<div class=" text-white text-end">
								<ul class="list-unstyled">
									<li><a class="text-white fs-6" href="{{ route('front.faq') }}">FAQ</a></li>
									<li><a class="text-white fs-6" href="{{ route('front.aviso') }}">{{$ftadp}}</a></li>
									<li><a class="text-white fs-6" href="{{ route('front.tyc') }}">{{$fttyc}}</a></li>
									<li><a class="text-white fs-6" href="{{ route('front.pde') }}">{{$ftpde}}</a></li>
								</ul>
							</div>
						</div>
						{{-- <div class="modal-footer d-flex justify-content-around">
							<div class=" text-white">
								{{$hftcitas}}: <br>
								<a class=" text-white" href="index.html">123123123</a> <br>
								<a class=" text-white" href="index.html">123123123</a> <br>
							</div>
							<button type="button" class="btn btn-outline-light"
								data-bs-dismiss="modal">Cerrar</button>
						</div> --}}
					</div>
				</div>
			</div>

		</div>
	</nav>
</header>
