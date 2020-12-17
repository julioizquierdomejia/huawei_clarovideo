@extends('layouts.app', ['title' => 'Registro'])
@section('header_script')
<script>
    ga('send', 'event','HUAWEI_CLAROVIDEO','Inicio','Registrate');
</script>
@endsection
@section('content')
<div class="cc-huawei pt-5 container">
	<div class="pt-md-5 pb-3 mt-md-5 px-md-5">
		<form class="row px-md-5" action="/register" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="col-12 col-md-6 form-group">
				<div class="f-group-w-icon">
				<input type="text" name="name" class="form-control bg-transparent pl-0 border-bottom @error('name') is-invalid @enderror" placeholder="Nombres" value="{{old('name')}}">
				<i class="far fa-user-circle icon"></i>
				</div>
				@error('name')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 col-md-6 form-group">
				<div class="f-group-w-icon">
				<input type="text" name="lastname" class="form-control bg-transparent pl-0 border-bottom @error('lastname') is-invalid @enderror" placeholder="Apellidos" value="{{old('lastname')}}">
				<i class="far fa-user-circle icon"></i>
				</div>
				@error('lastname')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 col-md-6 form-group">
				<div class="f-group-w-icon">
				<input type="text" name="phone" class="form-control bg-transparent pl-0 border-bottom @error('phone') is-invalid @enderror" placeholder="Número celular" value="{{old('phone')}}">
				<i class="fas fa-mobile-alt icon"></i>
				</div>
				@error('phone')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 col-md-6 form-group">
				<div class="f-group-w-icon">
				<input type="text" name="dni" class="form-control bg-transparent pl-0 border-bottom @error('dni') is-invalid @enderror" placeholder="DNI" value="{{old('dni')}}">
				<i class="far fa-id-card icon"></i>
				</div>
				@error('dni')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 col-md-6 form-group">
				<div class="f-group-w-icon">
				<input type="text" name="email" class="form-control bg-transparent pl-0 border-bottom @error('email') is-invalid @enderror" placeholder="correo electronico" value="{{old(' is')}}">
				<i class="fas fa-at icon"></i>
				</div>
				@error('email')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 col-md-6 form-group frm-code">
				<div class="f-group-w-icon">
				<input type="text" name="code" class="form-control bg-transparent pl-0 border-bottom @error('code') is-invalid @enderror" placeholder="código">
				<i class="far fa-keyboard icon"></i>
				<i class="fas fa-question-circle icon" data-toggle="modal" data-target="#modalCodeInfo" onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Registro','Que_es_esto');"></i>
				</div>
				@error('code')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 form-group pb-4">
				<div class="form-check" style="line-height: 13px;">
					<input class="form-check-input align-middle" type="checkbox" value="" id="defaultCheckTerms" name="confirm_terms">
					<label class="form-check-label small align-middle" for="defaultCheckTerms" style="font-size: 13px;">
						<span>Acepto y estoy de acuerdo con los <a class="text-white" target="_blank" href="/terminos-condiciones"><u>Términos y Condiciones y Autorización de Tratamiento de Datos Personales</u></a></span>
					</label>
				</div>
				@error('confirm_terms')
				<p class="error-message mb-0 text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="col-12 text-center">
				<button class="btn btn-red-transparent btn-login px-4" type="submit" onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Registro','Continuar');">Ingresar <i class="fa fa-play pl-2"></i></button>
			</div>
		</form>
		
	</div>
</div>
<div class="modal fade" id="modalCodeInfo" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark">
          <div class="modal-header">
            <h5 class="modal-title" id="modalRegisterTitle">Tu código de Masterclass</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <img class="img-fluid" src="{{ asset('img/home/d2.png') }}">
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('javascript')
<script type="text/javascript">
	
</script>
@endsection