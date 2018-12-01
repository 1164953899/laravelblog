<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Swiper全屏自适应图片轮播代码</title>

<link type="text/css" rel="stylesheet" href="{{asset('css')}}/style.css">
</head>
<body style="background-color: white">
<section class="pc-banner" style="background-color: white">
	<div>
		 <span>&nbsp&nbsp</span><a href="{{url('admin/photo/oper')}}" style="font-size: 18px"><<返回列表</a>
	</div>
	<div class="swiper-container" style="color: white">
		<div class="swiper-wrapper">
			@foreach($images as $v)
			<div class="swiper-slide swiper-slide-center none-effect">
				<a href="#">
					<img src="{{asset('upload')}}/{{$v->path}}">
				</a>
				<div class="layer-mask"></div>
			</div>
			@endforeach
		</div>
		<div class="button">
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
</section>
<script type="text/javascript" src="{{asset('js')}}/swiper.min.js"></script>
<script type="text/javascript">

	window.onload = function() {
		var swiper = new Swiper('.swiper-container',{
			autoplay: false,
			speed: 1000,
			autoplayDisableOnInteraction: false,
			loop: true,
			centeredSlides: true,
			slidesPerView: 2,
			pagination: '.swiper-pagination',
			paginationClickable: true,
			prevButton: '.swiper-button-prev',
			nextButton: '.swiper-button-next',
			onInit: function(swiper) {
				swiper.slides[2].className = "swiper-slide swiper-slide-active";
			},
			breakpoints: {
				668: {
					slidesPerView: 1,
				}
			}
		});
	}


</script>

</body>
</html>