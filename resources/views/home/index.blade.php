@extends('layouts.app', ['title' => 'Home'])
@section('header_script')
<script>
	ga('send', 'event','HUAWEI_CLAROVIDEO','Inicio','IngresaAqui');
</script>
<style type="text/css">
	.arrow-participa {
		position: absolute;left: 60%;bottom: 60px;z-index: 2;right: -20%;
	}
	@media (min-width: 768px) {
		.escribe-celular {
			left: 50%;
		}
		.arrow-3 {
			margin-top: -50px;
			margin-left: 20px
		}
		.arrow-4 {
			left: -40%;
			top: 23%
		}
		.registered {
			margin-top: -40px;z-index: 2
		}
	}
	@media (max-width: 767px) {
		.arrow-participa {
			position: static;
		}
	}
</style>
@endsection
@section('content')
<div class="cc-huawei pt-5 container">
	<div class="row pl-lg-5" style="min-height: calc(100vh - 73px)">
		<div class="col-12 col-md-6 d-flex align-items-center col-xl-4 py-2 py-xl-0 pl-lg-5">
			<div class="cc pl-lg-5">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 page-title">
					<p class="mt-md-4 mb-0">con</p>
					<h1 class="title">AppGallery y <br class="d-none d-md-block"> Claro video</h1>
					<p class="mt-3 text-uppercase">Estás a un paso <br class="d-none d-md-block">de ganar grandes <br class="d-none d-md-block">premios</p>
					<div class="c-arrow text-center pl-4">
						<img class="img-fluid i-arrow f-1 d-none d-md-inline-block" src="/img/home/flecha1.png" style="margin-top: -10px" width="55">
					</div>
					<p class="mt-3 text-uppercase">Si has comprado un equipo <br class="d-none d-md-block">HMS en Claro desde el 15 de <br class="d-none d-md-block">diciembre hasta el 31 de <br class="d-none d-md-block">diciembre</p>
					<div class="position-relative w-auto px-0">
					<h2 class="title">¡Participa!</h2>
					<div class="c-arrow arrow-participa">
						<img class="img-fluid i-arrow f-2 d-none d-md-inline-block" src="/img/home/flecha2.png" width="150">
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-6 d-flex flex-column justify-content-between col-xl-4 py-2 py-xl-0 pl-lg-5">
			<p class="mt-3 text-uppercase d-block d-md-none">Solo debes obtener <br class="d-none d-md-block"><strong>tu IMEI</strong></p>
			<p class="mt-3 text-uppercase position-relative escribe-celular">Escribe en tu celular <br class="d-none d-md-block"><strong><sup>*</sup>#06#</strong> <br class="d-none d-md-block">y con el resultado <br class="d-none d-md-block"> regístrate</p>
			<div class="c-arrow arrow-3">
				<img class="img-fluid i-arrow f-3 d-none d-md-inline-block" src="/img/home/flecha3.png" width="120">
			</div>
			<p class="mt-3 text-uppercase d-none d-md-block">Solo debes obtener <br class="d-none d-md-block"><strong>tu IMEI</strong></p>
			<div class="c-mobile" style="">
				<img class="mobile" src="/img/home/mobile.png" width="350">
			</div>
		</div>
		<div class="col-12 col-md-6 d-flex flex-column justify-content-between col-xl-4 py-2 py-xl-0 pl-lg-5">
			<div class="c-arrow position-relative arrow-4">
				<img class="img-fluid i-arrow f-4 d-none d-md-inline-block" src="/img/home/flecha4.png" width="320">
			</div>
			<div class="text-center position-relative registered">
				@if(Auth::user())
					<span class="d-block">Registrado :)</span>
					<a class="btn btn-danger" href="/ruleta">Ruleta <i class="fas fa-random"></i></a>
				@else
				<a class="btn btn-danger" href="/registro">Regístrate <i class="fas fa-user"></i></a>
				@endif
			</div>
			<div class="c-arrow text-center mt-3 pl-4 pl-md-5">
				<img class="img-fluid i-arrow f-5 d-none d-md-inline-block" src="/img/home/flecha5.png">
			</div>
			<div class="text-center">
				<p class="mt-3 text-uppercase"><span class="text-left d-inline-block">Recuerda <br class="d-none d-md-block"><strong>COMPARTIR</strong> <br class="d-none d-md-block"> con tus amigos</span></p>
			</div>
		</div>
	</div>
</div>
@endsection