@extends('layouts.app', ['title' => 'Registro'])
@section('header_script')
<script>
    ga('send', 'event','HUAWEI_CLAROVIDEO','Inicio','Registrate');
</script>
@endsection
@section('content')
<div class="cc-huawei pt-5 container">
	<div class="row pt-5 pl-lg-5" style="min-height: calc(100vh - 73px)">
		<div class="col-12 col-md-6 col-xl-4 py-2 pl-lg-5 d-flex align-items-center">
			<div class="cc pl-lg-5">
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
		<div class="col-12 col-md-6 col-xl-4 pt-2 pt-xl-0 pl-lg-5 d-flex flex-column justify-content-between">
			<p class="mt-3 text-uppercase position-relative" style="left: 50%">Escribe en tu celular <br><strong><sup>*</sup>#06#</strong> <br>y con el resultado <br> regístrate</p>
			<div class="c-arrow" style="margin-top: -50px;margin-left: 20px">
				<img class="img-fluid i-arrow f-3" src="/img/home/flecha3.png" width="120">
			</div>
			<p class="mt-3 text-uppercase">Solo debes obtener <br class="d-none d-md-block"><strong>tu IMEI</strong></p>
			<div class="c-mobile" style="">
				<img class="mobile" src="/img/home/mobile.png" width="430">
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 d-flex align-items-center py-xl-0 pl-lg-5 mx-md-auto mx-xl-0">
			<form class="px-xl-3" action="{{route('registro')}}" method="POST" enctype="multipart/form-data">
				<h2 class="title px-xl-3"><strong>HOY ES TU DÍA DE SUERTE</strong></h2>
			@csrf
			<div class="form-group">
				<div class="f-group-w-icon">
				<input type="text" name="name" class="form-control border-bottom @error('name') is-invalid @enderror" placeholder="Nombres" value="{{old('name')}}">
				<i class="far fa-user-circle icon"></i>
				</div>
			</div>
			<div class="form-group">
				<div class="f-group-w-icon">
				<input type="text" name="apellidos" class="form-control border-bottom @error('apellidos') is-invalid @enderror" placeholder="Apellidos" value="{{old('apellidos')}}">
				<i class="far fa-user-circle icon"></i>
				</div>
			</div>
			<div class="form-group">
				<div class="f-group-w-icon">
				<input type="text" name="email" class="form-control border-bottom @error('email') is-invalid @enderror" placeholder="correo electronico" value="{{old('email')}}">
				<i class="fas fa-at icon"></i>
				</div>
			</div>
			<div class="form-group">
				<div class="f-group-w-icon">
				<input type="text" name="celular" class="form-control border-bottom @error('celular') is-invalid @enderror" placeholder="Celular" value="{{old('celular')}}">
				<i class="fas fa-mobile-alt icon"></i>
				</div>
			</div>
			<div class="form-group">
				<div class="f-group-w-icon">
				<input type="text" name="dni" class="form-control border-bottom @error('dni') is-invalid @enderror" placeholder="DNI" value="{{old('dni')}}">
				<i class="far fa-id-card icon"></i>
				</div>
			</div>
			<div class="form-group frm-imei">
				<div class="f-group-w-icon">
				<input type="text" name="imei" class="form-control border-bottom @error('imei') is-invalid @enderror" placeholder="IMEI" value="{{old('imei')}}">
				<i class="far fa-keyboard icon"></i>
				</div>
			</div>
			<div class="form-group pl-3">
				<div class="form-check form-control border-0 bg-transparent p-0 h-auto @error('confirm_terms') is-invalid @enderror" style="line-height: 13px;">
					<input class="form-check-input align-middle" type="checkbox" value="" id="defaultCheckTerms" name="confirm_terms">
					<label class="form-check-label small align-middle text-danger" for="defaultCheckTerms" style="font-size: 13px;">
						<span>Acepto y estoy de acuerdo con los <a class="text-danger" target="_blank" href="/terminos-condiciones"><u>Términos y Condiciones y Autorización de Tratamiento de Datos Personales</u></a></span>
					</label>
				</div>
			</div>
			<div class="buttons text-left">
				<button class="btn btn-red-transparent btn-login px-4" type="submit" onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Registro','Continuar');">Ingresar <i class="fa fa-play pl-2"></i></button>
			</div>
		</form>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function (event) {
		@if ($errors->count())
	@php
		$html = '';
	@endphp
	@foreach ($errors->all() as $error)
		@php
			$html .= '<li>'.$error.'</li>';
		@endphp
	@endforeach
		Swal.fire(
          'LUCKYDRAW',
          '<ul class="text-left">{!!$html!!}</ul>',
          'error'
        )
	@endif
	})
</script>
@endsection