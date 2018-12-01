@extends('layouts/home')
{{-- 重写区块main --}}
@section('title',"时间轴")
@section('main')
<article>
  <div class="timebox" style="font-size: 16px;">
    <ul>
      @foreach($news as $v)
      <li><span>{{substr($v->created,0,10)}}</span><i><a href="{{url('home/news/detail',['id'=>$v->id])}}" target="_blank">{{$v->title}}</a></i></li>
      @endforeach
    </ul>
  </div>
 <div class="pagelist">{{$news->appends($_GET)->links()}}</div>
</article>
@endsection
