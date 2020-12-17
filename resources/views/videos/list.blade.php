@extends('layouts.app', ['title' => 'Home'])
@section('content')
<div class="cc-huawei pt-5 container-fluid">
	<div class="row pt-5 pb-3 pl-lg-5">
		<div class="col-12 col-md-5 col-lg-4 py-2 pl-lg-5">
			<div class="cc pl-lg-5 h-100">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 pt-3 pt-lg-5 page-title mt-md-5">
					<h1 class="title pt-md-4">{{ Auth::user()->name }}</h1>
					<p class="mt-5" style="font-size: 20px;width: 60%;">
						Prepárate para disfrutar de nuestras exclusivas MasterClasses
					</p>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-8 item-list">
			<div class="row text-center">
				<div class="col-12 col-sm-6 item px-0">
					<div class="item-content">
						<img class="img-fluid" src="{{ asset('img/home/chico.png') }}">
						<div class="item-text text-left pb-md-5">
							<p class="text-above mb-1">Master Class</p>
							<p class="pb-md-2">Básicos de la cocina peruana con</p>
							<h4 class="item-title mb-4">
								<strong>José del Castillo</strong>
							</h4>
							{{-- <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalSoon">Ver vídeo</button> --}}
							<a class="btn btn-danger" href="/vervideo/cocina-peruana" onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil','VerVideo_Gastro');">Ver vídeo</a>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 item px-0">
					<div class="item-content">
						<img class="img-fluid" src="{{ asset('img/home/chica.png') }}">
						<div class="item-text text-left pb-md-5">
							<p class="text-above mb-1">Master Class</p>
							<p class="pb-md-2">Entrenamiento Fullbody en casa con</p>
							<h4 class="item-title mb-4">
								<strong>Solange Barslund "La Vikinga"</strong>
							</h4>
							{{-- <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalSoon">Ver vídeo</button> --}}
							<a class="btn btn-danger" href="/vervideo/fullbody" onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil','VerVideo_Gym');">Ver vídeo</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$('.btn-s-login').on('click', function (event) {
		$('#collapseLogin').slideDown();
		$('.f-buttons').slideUp();
	})
	$('.btn-cancel').on('click', function (event) {
		$('#collapseLogin').slideUp();
		$('.f-buttons').slideDown();
	})
	$('.owl-carousel').owlCarousel({
	    margin:10,
	    responsiveClass:true,
	    stagePadding: 100,
	    nav: true,
	    dots: true,
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:3,
	            nav:false
	        },
	        1000:{
	            items:1,
	            nav:true,
	            loop:false
	        }
	    }
	})
</script>
@endsection