@extends('layouts.app', ['title' => 'Home', 'body_class' => 'bg-dark'])
@section('header_script')
<script>
	var v_type = "";
	@if ($video == 'cocina-peruana')
	v_type = "Gastro";
	ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Gastro_play');
	@else
	v_type = "Gym";
	ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Gastro_play');
	@endif
</script>
@endsection
@section('content')
<div class="cc-huawei pt-5 container">
	<div class="row pt-5 pb-3">
		<div class="col-12 col-md-5 col-lg-4 py-2">
			<div class="cc h-100">
				<div class="row pl-lg-5 h-100">
					<div class="col-12 pt-3 pt-lg-5 page-title mt-md-5">
						<h1 class="title pt-md-4">{{ Auth::user()->name }}</h1>
						<p class="mt-5" style="font-size: 20px;width: 60%;">
							Prepárate para disfrutar de nuestras exclusivas MasterClasses
						</p>
						<div class="buttons mt-5 pt-md-5">
							<div class="b-content pt-md-5">
								<button class="btn btn-danger" onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Volver'); window.history.back();"><i class="fas fa-arrow-circle-left pr-2"></i> Volver</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-8 videos-list">
			<div class="item h-100">
				<div class="item-content h-100">
					<div class="embed-responsive embed-responsive-16by9">
						<video controls="" class="embed-responsive-item item-video" oncontextmenu="return false;">
							@if ($video == 'cocina-peruana')
							<source src="{{ asset('videos/huawei-masterclass-cocina-online-hd.mp4') }}" type="video/mp4">
							@else
							<source src="{{ asset('videos/huawei-masterclass-fullbody.mp4') }}" type="video/mp4">
							@endif
						</video>
					</div>
					<div class="row mt-4">
						<div class="col-12 col-md-8 item-text">
							@if ($video == 'cocina-peruana')
							<p>Aprende la mejor técnica para preparar un delicioso <strong>Lomo Saltado</strong> y un increíble ceviche como todo un chef con <strong>José del Castillo</strong>.</p>
							<button class="btn btn-danger btn-video mt-2 mt-md-2" type="button" data-toggle="modal" data-target="#modalRecipe">Ver receta <i class="fa fa-clipboard-list pl-2"></i></button>
							@else
							<p>Aprende a tener total control de tu cuerpo y disfruta de una clase de entrenamiento Fullbody con <strong>"La Vikinga"</strong>.</p>
							@endif
						</div>
						<div class="col-12 col-md-4 py-2">
							<div class="dropdown">
								<button class="btn btn-outline-light btn-sm px-4 py-2 dropdown-toggle" data-toggle="dropdown"><small>Compartir</small> <i class="fas fa-share-alt ml-3"></i></button>
								<ul class="dropdown-menu">
									<li><a onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Compartir_fb');" class="btn btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									<li><a onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Compartir_fb');" class="btn twitter-share-button" href="https://twitter.com/intent/tweet?text=Este%vídeo%20te%20encantará%20&#128154;:%20%0A{{url()->current()}}.%0A" target="_blank"><i class="fab fa-twitter"></i></a></li>
									<li><button onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Compartir_fb');" class="btn btn-pinterest" type="button"><i class="fab fa-pinterest"></i></button></li>
									{{-- <li><a onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Compartir_fb');" class="btn btn-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}&title=Este%vídeo%20te%20encantará%20" target="_blank"><i class="fab fa-linkedin"></i></a></li> --}}
									<li><a onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Compartir_fb');" class="btn whatsapp-btn btn-whatsapp" target="_blank" data-text="Hola,%20te%20comparto%20nuestro%vídeo%20{{url()->current()}}" href="https://web.whatsapp.com/send?text=Hola,%20te%20comparto%20nuestro%vídeo%20%0A{{url()->current()}}"><i class="fab fa-whatsapp"></i></a></li>
									<li><a onclick="ga('send', 'event','HUAWEI_CLAROVIDEO','Perfil_Esperiencia_'+v_type,'Compartir_fb');" class="btn" href="mailto:?subject=Te invito a ver este vídeo&amp;body=Este vídeo te encantará &#9829;: %0A{{url()->current()}}.%0A%0A"><i class="fas fa-envelope"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@if ($video == 'cocina-peruana')
<div class="modal fade" id="modalRecipe" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTitle" aria-hidden="true">
  <div class="modal-dialog h-100 m-0" role="document">
    <div class="modal-content bg-dark h-100">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRegisterTitle">Ingredientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y: auto;">
        <div class="receta" style="font-size: 14px;">
			<p>Ceviche:</p>
			<ul>
			<li>200 gr de Pescado Fresco,</li>
			<li>1/3 de Cebolla Roja,</li>
			<li>01 Camote,</li>
			<li>01 Choclo,</li>
			<li>01 Kion,</li>
			<li>Ramas de Culantro,</li>
			<li>10 a 12 Limones,</li>
			<li>01 Rama de Apio,</li>
			<li>Hojas de Lechuga Americana,</li>
			<li>1/2 Aj&iacute; Limo,</li>
			<li>Cancha Chulpi,</li>
			<li>Sal y Pimienta.</li>
			</ul>
			<p>Lomo Saltado:</p>
			<ul>
			<li>200 gr de Lomo Fino,</li>
			<li>&frac12; Cebolla,</li>
			<li>01 Tomate,</li>
			<li>01 Papa Amarilla,</li>
			<li>01 Aj&iacute; Amarillo,</li>
			<li>Ramas de Culantro,</li>
			<li>Aceite Vegetal,</li>
			<li>Vinagre Tinto,</li>
			<li>Sillao,</li>
			<li>Or&eacute;gano,</li>
			<li>03 Dientes de Ajo,</li>
			<li>Sal y Pimienta.</li>
			</ul>
		</div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endif
@endsection