@extends('layouts/home')
{{-- 重写区块main --}}
@section('title',"首页")
@section('main')
<article>
  <aside class="l_box">
      <div class="about_me">
        <h2>关于我</h2>
        <ul>
          <i><img src="{{asset('images')}}/my.jpg" style="width: 80px;border-radius: 50%;margin-left: 20px"></i>
          <p><b>付林</b><br>PHP萌新，请多多指教～</p>
        </ul>
      </div>
      <div class="wdxc">
        <h2>我的相册</h2>
        <ul>
          @foreach($photo as $v)
          <li style="width:135px"><a href="{{url('home/photo/detail',['id'=>$v->id])}}" target="_blank"><img src="{{asset('upload')}}/{{$v->image}}"></a></li>
          @endforeach
        </ul>
      </div>
      <div class="fenlei">
        <h2>博客分类</h2>
        <ul>
          @foreach($category as $v)
          <li><a href="{{url('home/news/oper',['id'=>$v->id])}}">{{$v->cname}}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="tuijian">
        <h2>推荐文章</h2>
        <ul>
          @foreach($recommend as $v)
          <li><a href="{{url('home/news/detail',['id'=>$v->id])}}">{{$v->title}}</a></li>
          @endforeach
        </ul>
      </div>

      <div class="guanzhu">
        <h2>关注我</h2>
        <ul>
          <img src="{{asset('images')}}/wxzz.jpg">
        </ul>
      </div>
  </aside>
  <main class="r_box">
    @foreach($news as $v)
    <li><i><a href="{{url('home/news/detail',['id'=>$v->id])}}"><img style="width: 100%" src="{{asset('upload')}}/{{$v->image}}"></a></i>
      <h3><a href="{{url('home/news/detail',['id'=>$v->id])}}">{{$v->title}}</a></h3>
      <br>
      <p style="font-size: 13px">作者: {{$v->username}}&nbsp;&nbsp;&nbsp;&nbsp;分类: {{$v->cname}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间: {{$v->created}}&nbsp;&nbsp;&nbsp;&nbsp;阅读量:{{$v->view}}</p>
    </li>
    @endforeach
  </main>
  <div class="pagelist">{{$news->appends($_GET)->links()}}</div>
</article>
@endsection


