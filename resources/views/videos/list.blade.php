@extends('layouts.app', ['title' => 'Ruleta'])
@section('header_script')
<style type="text/css">
	.page .btn.btn-spin {
		background-color: #fdc20e;
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    margin-left: -60px;
	    margin-top: -60px;
	    min-width: 120px;
	    width: 120px;
	    height: 120px;
	    padding: 15px;
	}
	.page .btn-spin .btn-text {
		background-color: #fff;
	}
	.page .btn.btn-spin:before {
	    content: '';
	    position: absolute;
	    left: 50%;
	    top: -24px;
	    width: 0;
	    height: 0;
	    border: 25px solid #ffed4a;
	    border-left-color: transparent;
	    border-right-color: transparent;
	    border-top: 0;
	    border-left-width: 15px;
	    border-right-width: 15px;
	    margin-left: -15px;
	}
</style>
@endsection
@section('content')
<div class="cc-huawei container-fluid text-white">
	<div class="row pb-3 pl-lg-5 align-items-center">
		<div class="col-12 col-md-5 col-lg-4 py-2 pl-lg-5">
			<div class="cc pl-lg-5 h-100">
			<div class="row pl-lg-5 h-100">
				<div class="col-12 pt-lg-3 page-title">
					<h1 class="title pt-md-4">SUERTE</h1>
					<p class="mt-5 text-uppercase" style="font-size: 20px;width: 60%;">
						Gira el LuckyDraw de <br>AppGallery y Gana <br>uno de estos grandes <br>Premios
					</p>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12 col-md-7 col-lg-8 text-center">
			<div class="d-inline-block pt-5">
			<div class="position-relative d-flex align-items-center justify-content-center">
				<button class="btn btn-warning btn-spin rounded-circle" id="spin">
					<span class="btn-text d-table rounded-circle h-100 w-100">
						<span class="d-table-cell align-middle">Click <span class="d-block">aquí</span></span>
					</span>
				</button>
				<canvas id="canvas" width="500" height="500"></canvas>
			</div>
			<div class="prize mt-2" style="display: none;">Ganó <span class="prize-text"></span></div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	var options = {!!json_encode($prizes->toArray())!!};

	var startAngle = 0;
	var arc = Math.PI / (options.length / 2);
	var spinTimeout = null;

	var spinArcStart = 10;
	var spinTime = 0;
	var spinTimeTotal = 0;

	var ctx;

	document.getElementById("spin").addEventListener("click", spin);

	function byte2Hex(n) {
	  var nybHexString = "0123456789ABCDEF";
	  return String(nybHexString.substr((n >> 4) & 0x0F,1)) + nybHexString.substr(n & 0x0F,1);
	}

	function RGB2Color(r,g,b) {
		return '#' + byte2Hex(r) + byte2Hex(g) + byte2Hex(b);
	}

	function getColor(item, maxitem) {
	  var phase = 0;
	  var center = 128;
	  var width = 127;
	  var frequency = Math.PI*2/maxitem;
	  
	  red   = Math.sin(frequency*item+2+phase) * width + center;
	  green = Math.sin(frequency*item+0+phase) * width + center;
	  blue  = Math.sin(frequency*item+4+phase) * width + center;
	  
	  return RGB2Color(red,green,blue);
	}

	function drawRouletteWheel() {
	  var canvas = document.getElementById("canvas");
	  if (canvas.getContext) {
	    var outsideRadius = 200;
	    var textRadius = 160;
	    var insideRadius = 5;

	    ctx = canvas.getContext("2d");
	    ctx.clearRect(0,0,500,500);

	    ctx.strokeStyle = "#fc1a1b";
	    ctx.lineWidth = 25;

	    ctx.font = '500 15px Helvetica, Arial';

	    for(var i = 0; i < options.length; i++) {
	      var angle = startAngle + i * arc;
	      //ctx.fillStyle = colors[i];
	      //ctx.fillStyle = getColor(i, options.length);
	      if(i % 2 == 0) {
	      	ctx.fillStyle = "#aaa";
	      } else {
	      	ctx.fillStyle = "#222";
	      }

	      ctx.beginPath();
	      ctx.arc(250, 250, outsideRadius, angle, angle + arc, false);
	      ctx.arc(250, 250, insideRadius, angle + arc, angle, true);
	      ctx.stroke();
	      ctx.fill();

	      ctx.save();
	      /*ctx.shadowOffsetX = -1;
	      ctx.shadowOffsetY = -1;
	      ctx.shadowBlur    = 0;
	      ctx.shadowColor   = "#000";*/
	      ctx.fillStyle = "white";
	      ctx.translate(250 + Math.cos(angle + arc / 2) * textRadius, 
	                    250 + Math.sin(angle + arc / 2) * textRadius);
	      ctx.rotate(angle + arc / 2 + Math.PI / 2);
	      var text = options[i]['name'];
	      ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
	      ctx.restore();
	    } 

	    //Arrow
	    ctx.fillStyle = "white";
	    ctx.beginPath();
	    ctx.moveTo(250 - 4, 250 - (outsideRadius + 5));
	    ctx.lineTo(250 + 4, 250 - (outsideRadius + 5));
	    ctx.lineTo(250 + 4, 250 - (outsideRadius - 5));
	    ctx.lineTo(250 + 9, 250 - (outsideRadius - 5));
	    ctx.lineTo(250 + 0, 250 - (outsideRadius - 13));
	    ctx.lineTo(250 - 9, 250 - (outsideRadius - 5));
	    ctx.lineTo(250 - 4, 250 - (outsideRadius - 5));
	    ctx.lineTo(250 - 4, 250 - (outsideRadius + 5));
	    ctx.fill();
	  }
	}

	function spin() {
	  spinAngleStart = Math.random() * 10 + 10;
	  spinTime = 0;
	  spinTimeTotal = Math.random() * 3 + 4 * 1000;
	  rotateWheel();
	}

	function rotateWheel() {
	  spinTime += 30;
	  if(spinTime >= spinTimeTotal) {
	    stopRotateWheel();
	    return;
	  }
	  var spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
	  startAngle += (spinAngle * Math.PI / 180);
	  drawRouletteWheel();
	  spinTimeout = setTimeout('rotateWheel()', 30);
	  $('#spin').hide();
	}

	function stopRotateWheel() {
	  clearTimeout(spinTimeout);
	  var degrees = startAngle * 180 / Math.PI + 90;
	  var arcd = arc * 180 / Math.PI;
	  var index = Math.floor((360 - degrees % 360) / arcd);
	  var text = options[index]['name']
	  /*ctx.save();
	  ctx.font = 'bold 30px Helvetica, Arial';
	  ctx.fillText(text, 250 - ctx.measureText(text).width / 2, 250 + 10);*/
	  ctx.restore();
	  $('#spin').show();

	  $.ajax({
        type: 'POST',
        url: '/winner',
        data: {
        	'_token': '{{csrf_token()}}',
        	'prize_id': options[index]['id']
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
                    $('.prize').show();
                    $('.prize-text').text(text)
                })
            } else {
                Swal.fire(
                  'LUCKYDRAW',
                  result.data,
                  'warning'
                ).then((after) => {
                    $('.prize').hide();
                })
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            var errors = jqXHR.responseJSON;
            console.log(errors)
        }
    });
	}

	function easeOut(t, b, c, d) {
	  var ts = (t/=d)*t;
	  var tc = ts*t;
	  return b+c*(tc + -3*ts + 3*t);
	}

	drawRouletteWheel();
</script>
@endsection