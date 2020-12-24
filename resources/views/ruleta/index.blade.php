@extends('layouts.app', ['title' => 'LuckyDraw'])
@section('header_script')
<style type="text/css">
	.roulette-container {
		position: relative;
		max-width: 100%;
	}
	.roulette {
		margin: 0 auto;
		width: 400px;
		height: 400px;
		background-color: white;
		background-image: url('{{ asset('img/ruleta_fondo.png') }}');
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
		border-radius: 300px;
	}

	.page .btn.spinner {
		cursor: pointer;
		font-size: 14px;
		font-weight: bold;
		border: none;
		position: absolute;
		width: 50px;
		height: 50px;
		top: 50%;
		left: 50%;
		margin-top: -25px;
		margin-left: -25px;
		border-radius: 100%;
		z-index: 1000;
		min-width: auto;
		padding: 0;
	}

	.spinner .pointer {
		position: absolute;
		width: 0; 
		height: 0; 
		top: -8px;
		left: 15px;
		border-left: 10px solid transparent;
		border-right: 10px solid transparent;
		border-bottom: 10px solid #ffed4a;
	}
	@media (max-width: 400px) {
		.roulette {
			width: 380px;
			height: 380px;
		}
	}
	@media (max-width: 380px) {
		.roulette {
			width: 320px;
			height: 320px;
		}
	}
</style>
@endsection
@section('content')
<div class="cc-huawei pt-5 container-fluid text-white">

	<div class="row pb-3 pl-lg-5 align-items-center">
		<div class="col-12 col-md-5 col-lg-4 py-2 pl-lg-5">
			<div class="cc pl-lg-5 h-100">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 pt-lg-3 page-title text-center text-md-left">
					<h1 class="title pt-md-4">SUERTE</h1>
					<p class="mt-5 text-uppercase subtitle">
						Gira el LuckyDraw de <br class="d-none d-md-block">AppGallery y Gana <br class="d-none d-md-block">uno de estos grandes <br class="d-none d-md-block">Premios
					</p>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-8 text-center">
			<div class="d-inline-block pt-md-5">
			
				<div class="roulette-container">
				  <div class="roulette">
				  </div>
				  <button class="btn btn-warning spinner" type="button"><span>Girar!</span><div class="pointer"></div></button>  
				</div>
				<div class="price mt-4">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript" src="{{ asset('online/jquery.fortune.js') }}"></script>
<script>
var options = {!!json_encode($prizes->toArray())!!};

$(function() {

var $r = $('.roulette').fortune(options);

var clickHandler = function() {
  $('.spinner').off('click');
  $('.spinner span').hide();
  $r.spin().done(function(price) {
  	$('.spinner').on('click', clickHandler);
  	$('.spinner span').show();
    $.ajax({
        type: 'POST',
        url: '/winner',
        data: {
        	'_token': '{{csrf_token()}}',
        	'prize_id': price.id
        },
        success: function(result) {
        	console.log(result)
            if(result.success) {
            	data = $.parseJSON(result.data);
                Swal.fire(
                  'LUCKYDRAW',
                  'Su premio es: ' + data.name,
                  'success'
                ).then((after) => {
				    $('.price').text('Ganaste: ' + price.name);
                })
            } else {
                Swal.fire(
                  'LUCKYDRAW',
                  result.data,
                  'warning'
                ).then((after) => {
                    $('.prize').hide();
                    $('.price').text(result.data);
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            var errors = jqXHR.responseJSON;
            console.log(errors)
        }
    });
  });
};

$('.spinner').on('click', clickHandler);
});
</script>
@endsection