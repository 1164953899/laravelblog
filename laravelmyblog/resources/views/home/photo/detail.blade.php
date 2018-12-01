@extends('layouts/home')
{{-- 重写区块main --}}
@section('title',"相册")
@section('main')
<article>
  <main class="r_box" style="width: 100%;height: 100%">
    <section class="pc-banner" style="background-color: white">
           <span><a href="{{url('home/photo/oper')}}"><<返回列表</a></span>
    <div class="swiper-container" style="color: white">
        <div class="swiper-wrapper">
            @foreach($photo as $v)
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
  </main>
</article>
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
@endsection
