@extends('layouts.front')

@section('title', 'FAQS')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')
	@php
		$envar = (Session::get('lang') == 'es' ) ? '' : '_en' ;
	@endphp
	<div class="container">
		<div class="accordion accordion-flush" id="accordionFlushExample">
			@foreach ($preguntas as $faq)
				<div class="accordion-item">
					<h2 class="accordion-header" id="flush-heading{{$faq->id}}">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$faq->id}}" aria-expanded="false" aria-controls="flush-collapse{{$faq->id}}">
							{{ $faq->{'pregunta'.$envar} }}
						</button>
					</h2>
					<div id="flush-collapse{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$faq->id}}" data-bs-parent="#accordionFlushExample">
						<div class="accordion-body">
							{!! $faq->{'respuesta'.$envar} !!}
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
