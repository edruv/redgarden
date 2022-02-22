<div id="slide-out" class="side-nav sn-bg-5 fixed">
	<ul class="custom-scrollbar">
	<li class="logo-sn waves-effect py-3">
		<div class="text-center">
			<a href="{{ url('admin') }}" class="pl-0">
				<img class="img-fluid h-100" src="{{asset('img/design/logo_woz.png')}}">
			</a>
		</div>
	</li>
			<li>
				<ul class="collapsible collapsible-accordion">
					{{-- <li>
						<a href="{{ route('pedidos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/pedidos')) ? 'active' : '' }}"><i class="w-fa fas fa-file-invoice-dollar"></i>Pedidos</a>
					</li>
					<li class="{{ (request()->is('admin/config')) ? 'active' : '' }}">
						<a class="collapsible-header waves-effect arrow-r">
							<i class="fas fa-gavel"></i>
							Subastas
							<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="{{ route('subastas.orden.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/subastas/ordenes')) ? 'active' : '' }}"> Panel ubastas</a>
								</li>
								<li>
									<a href="{{ route('subastas.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/subastas')) ? 'active' : '' }}"> Subastas</a>
								</li>
							</ul>
						</div>
					</li> --}}
					{{-- <li>
						<a href="{{ route('subastas.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/subastas')) ? 'active' : '' }}"> <i class="fas fa-gavel"></i>Subastas</a>
					</li> --}}
					{{-- <li>
						<a href="{{ route('productos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/productos')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Productos</a>
					</li>
					<li>
						<a href="{{ route('config.space.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/spaces')) ? 'active' : '' }}"><i class="fas fa-couch"></i>Espacios</a>
					</li>
					<li>
						<a href="{{ route('clientes.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/clientes')) ? 'active' : '' }}"><i class="w-fa fas fa-users"></i>Clientes</a>
					</li>
					<li>
						<a href="{{ route('newslatters.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/newslatters')) ? 'active' : '' }}"><i class="fab fa-mailchimp"></i>Newslatter</a>
					</li>

					<li>
						<a href="{{ route('config.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}"><i class="w-fa fas fa-cog"></i>Configuración</a>
					</li> --}}
				</ul>
				<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<a href="{{ route('pedidos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/pedidos')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Pedidos</a>
					</li>
					<li>
						<a href="{{ route('productos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/productos')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Productos</a>
					</li>
					<li>
						<a href="{{ route('servicio.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/servicios')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Servicio</a>
					</li>
					<li>
						<a href="{{ route('clientes.index') }}" class="collapsible-header waves-effect"><i class="fas fa-users"></i></i>Clientes</a>
					</li>
					<li>
						{{-- <a href="{{ url('admin/config/') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}"><i class="w-fa fas fa-cog"></i>Configuración</a> --}}
						<a href="{{ route('config.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}"><i class="w-fa fas fa-cog"></i>Configuración</a>
					</li>
				</ul>
			</li>
			</li>
		</ul>

	<div class="sidenav-bg mask-strong"></div>

	<div class="fixed-action-btn clearfix d-none" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-lg red">
			<i class="fas fa-pencil-alt"></i>
		</a>
		<ul class="list-unstyled">
			<li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
			<li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
			<li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
			<li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
		</ul>
	</div>
</div>
