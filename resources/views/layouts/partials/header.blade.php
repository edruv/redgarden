<header>
	<nav class="navbar navbar-light" aria-label="First navbar example">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#menuModal">
				<i class="fas fa-bars"></i>
			</button>
			<a class="navbar-brand" href="{{ route('front.index') }}">
				<img src="{{asset('img/design/logo.png')}}" alt="logo.png" class="img-fluid" style="height:4em;">
			</a>
			<div class="">
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
							<ul class="list-unstyled text-center">
								<li class=""><a href="{{ route('front.index') }}" class="text-white fw-bold text-uppercase">{{$hftindex}}</a></li>
								<li class=""><a href="{{ route('front.productos') }}" class="text-white fw-bold text-uppercase">{{$hftstore}}</a></li>

								<li class=""><a href="{{ route('front.servicios') }}" class="text-white fw-bold text-uppercase">{{$hftservices}}</a></li>
								<li class=""><a href="{{ route('front.aboutus') }}" class="text-white fw-bold text-uppercase">{{$hftabout}}</a></li>
								<li class=""><a href="{{ route('front.contacto') }}" class="text-white fw-bold text-uppercase">{{$hftcontact}}</a></li>

								<li class="">
									<a href="index.html" class="px-1 text-white"><span class="fab fa-whatsapp"></span></a>
									<a href="index.html" class="px-1 text-white"><span class="fab fa-instagram"></span></a>
									<a href="index.html" class="px-1 text-white"><span class="fab fa-facebook"></span></a>
									<a href="index.html" class="px-1 text-white"><span class="fab fa-youtube"></span></a>
								</li>
							</ul>
						</div>
						<div class="modal-footer d-flex justify-content-around">
							<div class=" text-white">
								{{$hftcitas}}: <br>
								<a class=" text-white" href="index.html">123123123</a> <br>
								<a class=" text-white" href="index.html">123123123</a> <br>
							</div>
							<button type="button" class="btn btn-outline-light"
								data-bs-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</nav>
</header>
