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
	    border: 10px solid #ffed4a;
	    background: #fff;
		cursor: pointer;
	    font-size: 14px;
	    font-weight: bold;
	    position: absolute;
	    width: 80px;
	    height: 80px;
	    top: 50%;
	    left: 50%;
	    margin-top: -40px;
	    margin-left: -40px;
	    border-radius: 100%;
	    min-width: auto;
	    padding: 0;
	    z-index: 1000;
	}

	.spinner .pointer {
		position: absolute;
		width: 0; 
		height: 0; 
		top: -29px;
		left: 20px;
		border-left: 10px solid transparent;
		border-right: 10px solid transparent;
		border-bottom: 20px solid #ffed4a;
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
		<div class="col-12 col-md-5 col-lg-3 py-2 pl-lg-5">
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
		<div class="col-12 col-md-7 col-lg-5 text-center">
			<div class="d-inline-block pt-md-5">
			
				<div class="roulette-container">
				  <div class="roulette">
				  </div>
				  <button class="btn btn-warning spinner" type="button"><span>Click <br>aquí</span><div class="pointer"></div></button>  
				</div>
				<div class="base user-select-none" style="margin-top: -10px">
					<img alt="" src="{{ asset('img/base-ruleta.png') }}" width="200">
				</div>
			</div>
		</div>
		<div class="col-12 col-md-5 col-lg-3 py-2 pl-lg-5 prize-container" style="display: none;">
			<div class="cc pl-lg-5 h-100 pt-3 mb-3">
				<h1 class="title pt-md-4">FELICIDADES</h1>
				<p class="mt-3 subtitle" style="font-size: 18px">Acabaste de ganar</p>
				<div class="prize_item mt-4"></div>
				<ul class="coupons list-inline mt-5 mb-4"></ul>
				<p class="coupons-message" style="display: none;">Te hemos enviado un correo a {{Auth::user()->email}}</p>
			</div>
			<a class="btn btn-danger d-inline-flex align-items-center pl-4" href="/registro"><span class="mx-auto"><span class="pl-4">Volver</span></span> <i class="fas fa-chevron-circle-left ml-auto"></i></a>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript" src="{{ asset('online/jquery.fortune.js') }}?v=4"></script>
<script>
var options = {!!json_encode($prizes->toArray())!!};

$(function() {

var $r = $('.roulette').fortune(options);

var clickHandler = function() {
  $('.spinner').off('click');
  $('.spinner span').hide();
  $r.spin().done(function(prize_item) {
  	$('.spinner').on('click', clickHandler);
  	$('.spinner span').show();
    $.ajax({
        type: 'POST',
        url: '/winner',
        data: {
        	'_token': '{{csrf_token()}}',
        	'prize_id': prize_item.id
        },
        success: function(result) {
        	console.log(result)
        	$('.coupons-message').hide();
            if(result.success) {
            	data = $.parseJSON(result.data);
            	$('.coupons').empty().show();
                Swal.fire(
                  'LUCKYDRAW',
                  'Su premio es: ' + data.name,
                  'success'
                ).then((after) => {
                	coupons = result.coupons ? $.parseJSON(result.coupons) : [];
                	$.each(coupons, function (id, item) {
                		$('.coupons').append(
                			`<li>`+item.code+`</li>`
                			)
                	})
                	$('.prize-container').slideDown();
				    $('.prize_item').text(prize_item.name);
				    if(coupons.length && result.send_email) {
				    	$('.coupons-message').show();
				    }
				    @if ($production)
				    $.ajax
	                ({
	                    type: 'POST',
	                    url: '/logout',
	                    data: {
				        	'_token': '{{csrf_token()}}',
				        },
	                    success: function()
	                    {
	                        //location.reload();
	                    }
	                });
				    @endif
                })
            } else {
                Swal.fire(
                  'LUCKYDRAW',
                  result.data,
                  'warning'
                ).then((after) => {
                    $('.prize-container').hide();
                    $('.prize_item').text(result.data);
                })
            }
            @if ($production)
            $('.spinner').attr('disabled', true);
            @endif
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