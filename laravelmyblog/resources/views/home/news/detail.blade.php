@extends('layouts/home')
{{-- 重写区块main --}}
@section('title',"文章详情")
@section('main')
<article>
  <aside class="l_box">
        <div class="cloud">
      <h2>标签云</h2>
      <ul>
        @foreach($babacategory as $v)
        <a href="{{url('home/news/sonoper',['id'=>$v->id])}}">{{$v->cname}}</a>
        @endforeach
      </ul>
    </div>
    <div class="tuijian">
      <h2>站长推荐</h2>
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
  <main>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{{$news->title}}</h3>
        <div class="bloginfo">
          <ul>
            <li class="author">作者：<a href="/">{{$news->username}}</a></li>
            <li class="timer">时间：{{$news->created}}</li>
            <li class="view">{{$news->view}}人已阅读</li>
          </ul>
        </div>
        <div class="tags"><a href="{{url('home/news/sonoper',['id'=>$news->cid])}}">{{$news->cname}}</a></div>
        <div class="news_con">{!! html_entity_decode($news->content) !!}</div>
      </div>
      <div class="nextinfo">
        <p><a href="{{url('home/news/sonoper',['id'=>$news->cid])}}"><<<返回列表</a></p>
      </div>
    </div>
  </main>
</article>
@endsection

