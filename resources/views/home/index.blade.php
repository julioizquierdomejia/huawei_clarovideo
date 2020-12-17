@extends('layouts.app', ['title' => 'Home'])
@section('header_script')
<script>
	ga('send', 'event','HUAWEI_CLAROVIDEO','Inicio','IngresaAqui');
</script>
@endsection
@section('content')
<div class="cc-huawei pt-5 container-fluid">
	<div class="row pt-5 pb-3 pl-lg-5">
		<div class="col-12 col-md-5 col-lg-4 py-2 pl-lg-5">
			<div class="cc pl-lg-5 h-100">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 pt-3 pt-lg-5 page-title">
					<p class="mt-4 mb-0">con</p>
					<h1 class="title">AppGallery y Claro Video</h1>
					<p class="mt-3 text-uppercase">Estás a un paso de ganar grandes premios</p>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection