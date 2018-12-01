@extends('layouts/home')
{{-- 重写区块main --}}
@section('title',"文章列表")
@section('main')
<article>
  <aside class="l_box">
    <div class="cloud">
      <h2>标签云</h2>
      <ul>
        @foreach($blogcategory as $v)
        <a href="{{url('home/news/sonoper',['id'=>$v->id])}}">{{$v->cname}}</a> 
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
     <div class="tuijian">
      <h2>点击排行</h2>
      <ul>
        @foreach($check as $v)
        <li><a href="{{url('home/news/detail',['id'=>$v->id])}}">{{$v->title}}</a></li>
        @endforeach
      </ul>
    </div>
  </aside>
  <main class="r_box">
    @foreach($news as $v)
    <li><i><a href="{{url('home/news/detail',['id'=>$v->id])}}"><img src="{{asset('upload')}}/{{$v->image}}" style="width: 100%"></a></i>
      <h3><a href="{{url('home/news/detail',['id'=>$v->id])}}">{{$v->title}}</a></h3>
           <p><p style="font-size: 13px">作者: {{$v->username}}&nbsp;&nbsp;&nbsp;&nbsp;分类: {{$v->cname}}&nbsp;&nbsp;&nbsp;&nbsp;发布时间: {{$v->created}}&nbsp;&nbsp;&nbsp;&nbsp;阅读量:{{$v->view}}</p></p>
    </li>
    @endforeach
  </main>
  <div class="pagelist">{{$news->appends($_GET)->links()}}</div>
</article>
@endsection


