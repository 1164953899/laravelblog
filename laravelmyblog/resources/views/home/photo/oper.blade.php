@extends('layouts/home')
{{-- 重写区块main --}}
@section('title',"相册列表")
@section('main')
<article>
  <div class="picbox">
    @foreach($photo as $v)
    <ul>
        <li data-scroll-reveal="enter bottom over 1s" ><a href="{{url('home/photo/detail',['id'=>$v->id])}}"><i><img style="width:100%" src="{{asset('upload')}}/{{$v->image}}"></i>
        <div class="picinfo" style="height: 130px;">
          <h3>{{$v->title}}</h3>
          <span>{{$v->content}}</span>
        </div>
        </a>
      </li>
    </ul>
    @endforeach
  </div>
</article>
 <div class="pagelist">{{$photo->appends($_GET)->links()}}</div>
<a href="#" class="cd-top">Top</a>
<script>
	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		(function(){
			window.scrollReveal = new scrollReveal({reset: true});
		})();
	};
</script>
@endsection

