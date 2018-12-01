<!doctype html>
<html>
<head>
<meta charset="gbk">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{asset('css')}}/base.css" rel="stylesheet">
<link href="{{asset('css')}}/index.css" rel="stylesheet">
<link href="{{asset('css')}}/m.css" rel="stylesheet">
<link href="{{asset('css')}}/info.css" rel="stylesheet">
<link href="{{asset('css')}}/time.css" rel="stylesheet">
<link href="{{asset('layui')}}/css/layui.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('css')}}/style.css">
<script type="text/javascript" src="{{asset('js')}}/swiper.min.js"></script>
<script src="{{asset('js')}}/scrollReveal.js"></script>
<script src="{{asset('js')}}/time.js"></script>
<script src="{{asset('js')}}/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js')}}/comm.js"></script>
<script type="text/javascript" src="{{asset('layui')}}/layui.js"></script>
<style type="text/css">
  .pagelist {
    margin-left: 50%;
  }
  .pagelist .disabled{
    color: #666; margin: 0 2px 5px 2px; display: inline-block; border: 1px solid #fff; padding: 5px 10px; background: #FFF
  }
  .pagelist .active{
    color: white; margin: 0 2px 5px 2px; display: inline-block; border: 1px solid #fff; padding: 5px 10px; background:#33CCFF;
  }
  .pagelist li{

          float: left;
  }
</style>
</head>
<body>
            @if(session()->has('message'))
          <span id="msg" style="color: green;margin-left: 30px;font-size: 0px">{{session()->get('message')}}</span>
          @endif
<header class="header-navigation" id="header">
  <nav><div class="logo"><a href="/">FLBlog</a>
  </div>
    <h2 id="mnavh"><span class="navicon"></span></h2>
    <ul id="starlist">
      <li><a href="{{url('/')}}">首页</a></li>
      @foreach($category as $v)
      <li><a href="{{url('home/news/oper',['id'=>$v->id])}}">{{$v->cname}}</a></li>
      @endforeach
      <li><a href="{{url('home/photo/oper')}}">我的相册</a></li>
      <li><a href="{{url('home/content/index')}}">留言版</a></li>
      <li><a href="{{url('home/time/index')}}">时间轴</a></li>
      <li>
        @if(session()->has('username'))
          <a href="#">{{session()->get('username')}}</a>
          <span>|</span>
          <a href="{{url('home/user/logout')}}">退出</a>
        @else
          <a href="#" id="login">登录</a>
          <span>|</span>
          <a href="#" id="reg">注册</a>
        @endif
      </li>
    </ul>
</nav>
</header>
@yield('main')
<footer>
  <p><a href="#" target="_blank">付林的个人博客</a> <a href="/"></a></p>
</footer>
<a href="#" class="cd-top">Top</a>
<script type="text/javascript">

      layui.use(['form','layer'], function() {
        var form = layui.form();
        form.render();
          });

      $('#login').on('click', function(){
        layer.open({
            type: 2,
            title: '用户登录',
            area: ['400px', '350px'],
            content:'{{url("home/user/login")}}',
          });
        })

    $('#reg').on('click', function(){
        layer.open({
            type: 2,
            title: '用户注册',
            area: ['500px', '560px'],
            content:'{{url("home/user/add")}}',
          });
    });
</script>
</body>
</html>

