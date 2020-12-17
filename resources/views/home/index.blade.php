@extends('layouts.app', ['title' => 'Home'])
@section('header_script')
<script>
	ga('send', 'event','HUAWEI_CLAROVIDEO','Inicio','IngresaAqui');
</script>
@endsection
@section('content')
<div class="cc-huawei pt-5 container-fluid">
	<div class="row pt-5 pb-3 pl-lg-5">
		<div class="col-12 col-md-4 py-2 pl-lg-5">
			<div class="cc pl-lg-5 h-100">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 page-title">
					<p class="mt-4 mb-0">con</p>
					<h1 class="title">AppGallery y <br> Claro Video</h1>
					<p class="mt-3 text-uppercase">Estás a un paso <br class="d-none d-md-block">de ganar grandes <br class="d-none d-md-block">premios</p>
					<img class="img-fluid f-1" src="/img/home/flecha1.png">
					<p class="mt-3 text-uppercase">Si has comprado un equipo <br class="d-none d-md-block">HMS en Claro desde el 15 de <br class="d-none d-md-block">diciembre hasta el 31 de <br class="d-none d-md-block">diciembre</p>
					<h2 class="title">¡Participa!</h2>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-4 py-2 pl-lg-5">
			<img class="img-fluid f-2" src="/img/home/flecha2.png">
			<p class="mt-3 text-uppercase">Solo debes obtener <br class="d-none d-md-block"><strong>tu IMEI</strong></p>
			<img class="mobile" src="/img/home/mobile.png">
			<img class="img-fluid f-3" src="/img/home/flecha3.png">
			<p class="mt-3 text-uppercase">Escribe en tu celular <br><strong><sup>*</sup>#06#</strong> <br>y con el resultado regístrate</p>
		</div>
		<div class="col-12 col-md-4 py-2 pl-lg-5">
			<img class="img-fluid f-4" src="/img/home/flecha4.png">
			<a class="btn btn-danger" href="/registro">Regístrate <i class="fas fa-user"></i></a>
			<img class="img-fluid f-3" src="/img/home/flecha3.png">
			<p class="mt-3 text-uppercase">Escribe en tu celular <br><strong><sup>*</sup>#06#</strong> <br>y con el resultado regístrate</p>
		</div>
	</div>
</div>
@endsection