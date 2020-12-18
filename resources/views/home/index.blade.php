@extends('layouts.app', ['title' => 'Home'])
@section('header_script')
<script>
	ga('send', 'event','HUAWEI_CLAROVIDEO','Inicio','IngresaAqui');
</script>
@endsection
@section('content')
<div class="cc-huawei pt-5 container">
	<div class="row pt-5 pb-3 pl-lg-5">
		<div class="col-12 col-md-6 col-xl-4 py-2 pl-lg-5">
			<div class="cc pl-lg-5 h-100">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 page-title">
					<p class="mt-4 mb-0">con</p>
					<h1 class="title">AppGallery y <br> Claro Video</h1>
					<p class="mt-3 text-uppercase">Estás a un paso <br class="d-none d-md-block">de ganar grandes <br class="d-none d-md-block">premios</p>
					<div class="c-arrow text-center pr-5">
						<img class="img-fluid i-arrow f-1" src="/img/home/flecha1.png" style="margin-top: -20px" width="55">
					</div>
					<p class="mt-3 text-uppercase">Si has comprado un equipo <br class="d-none d-md-block">HMS en Claro desde el 15 de <br class="d-none d-md-block">diciembre hasta el 31 de <br class="d-none d-md-block">diciembre</p>
					<div class="position-relative w-auto px-0">
					<h2 class="title">¡Participa!</h2>
					<div class="c-arrow" style="position: absolute;left: 60%;bottom: 50px;z-index: 2;right: -20%;">
						<img class="img-fluid i-arrow f-2" src="/img/home/flecha2.png" width="150">
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 py-2 pl-lg-5 d-flex flex-column">
			<p class="mt-3 text-uppercase position-relative" style="left: 50%">Escribe en tu celular <br><strong><sup>*</sup>#06#</strong> <br>y con el resultado <br> regístrate</p>
			<div class="c-arrow" style="margin-top: -50px;margin-left: 20px">
				<img class="img-fluid i-arrow f-3" src="/img/home/flecha3.png" width="120">
			</div>
			<p class="mt-3 text-uppercase">Solo debes obtener <br class="d-none d-md-block"><strong>tu IMEI</strong></p>
			<div class="c-mobile" style="margin-top: -80px;margin-left: -40px">
				<img class="mobile" src="/img/home/mobile.png" width="430">
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 py-2 pl-lg-5">
			<div class="c-arrow position-relative" style="left: -40%;top: 18%">
				<img class="img-fluid i-arrow f-4" src="/img/home/flecha4.png" width="320">
			</div>
			<div class="text-center position-relative" style="margin-top: -40px;z-index: 2">
				@if(Auth::user())
					<span class="d-block">Registrado :)</span>
					<a class="btn btn-danger" href="/ruleta">Ruleta <i class="fas fa-random"></i></a>
				@else
				<a class="btn btn-danger" href="/registro">Regístrate <i class="fas fa-user"></i></a>
				@endif
			</div>
			<div class="c-arrow text-center mt-3 pl-4 pl-md-5">
				<img class="img-fluid i-arrow f-5" src="/img/home/flecha5.png">
			</div>
			<div class="text-center">
				<p class="mt-3 text-uppercase"><span class="text-left d-inline-block">Recuerda <br><strong>COMPARTIR</strong> <br> con tus amigos</span></p>
			</div>
		</div>
	</div>
</div>
@endsection