@extends('layouts.front')

@section('title') {{$politica->titulo}} @endsection
{{-- @section('cssExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

	<div class="">
		<div class="container">
			<h1 class="text-orange title text-center" style=""> {{ $politica->titulo }} </h1>
		</div>
	</div>
	<div class="container">
		<div class="my-4" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
			<div class="col-12 col-md-8 p-4 mx-auto bg-white" style="border: .5em solid #006532;">
				{!! $politica->descripcion !!}
			</div>
		</div>
	</div>
@endsection

@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$('iframe').attr('width', '100%');
		$('iframe').attr('height', '460');

		// window.onload = function() {
		//
		// };
		//
		// $(document).ready(function() {
		// });

	</script>
@endsection
