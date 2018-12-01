<!doctype html>
<html>
<head>
<meta charset="gbk">
<title>首页</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{asset('css')}}/base.css" rel="stylesheet">
<link href="{{asset('css')}}/index.css" rel="stylesheet">
<link href="{{asset('css')}}/m.css" rel="stylesheet">
<link href="{{asset('css')}}/info.css" rel="stylesheet">
<link href="{{asset('css')}}/time.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('css')}}/style.css">
<script src="{{asset('js')}}/scrollReveal.js"></script>
<script src="{{asset('js')}}/jquery-3.3.1.js"></script>
<script src="{{asset('js')}}/"></script>
<script type="text/javascript" src="{{asset('js')}}/comm.js"></script>
<script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
<style type="text/css">
  .pagelist {
    margin-left: 50%;
  }
  .pagelist .disabled{
    color: #666; margin: 0 2px 5px 2px; display: inline-block; border: 1px solid #fff; padding: 5px 10px; background: #FFF; 
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
    </ul>
</nav>
</header>
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
    <div class="guanzhu">
      <h2>关注我~</h2>
      <ul>
            <img src="{{asset('images')}}/wxzz.jpg">
      </ul>
    </div>
  </aside>
  <main class="r_box">
<div class="gbook">
      @foreach($comment as $v)
      <div class="fb">
        <ul>
          <p class="fbtime"><span style="padding-right: 50px;">{{$v->create}}</span>{{$v->name}}</p>
          <p class="fbinfo">{!! html_entity_decode($v->content) !!}</p>
        </ul>
      </div>
      @endforeach
        @if(session()->has('message'))
          <span id="msg" style="color: green;margin-left: 30px;font-size: 0px">{{session()->get('message')}}</span>
          @endif
      <div class="gbox">
        <form action="{{url('home/content/save')}}" method="post" enctype="multipart/form-data">
          <p> <strong>来说点儿什么吧...</strong></p>
          <p><span> 您的姓名:</span>
            <input name="name" type="text">
            <span style="color: red">*{{$errors->first('name')}}</span></p>
          <p><span>联系方式:</span>
            <input name="email" type="text" >
            <span style="color: red">*{{$errors->first('email')}}</span></p>
          <p><span class="tnr">留言内容:</span>
            <script id="ue-container" name="content"  type="text/plain"></script>
            <span style="color: red">*{{$errors->first('content')}}</span>
          </p>
          <p>
            {{csrf_field()}}
            <input type="submit" value="提交">
          </p>
        </form>
      </div>
    </div>
  </main>
   <div class="pagelist">{{$comment->appends($_GET)->links()}}</div>
</article>
<footer>
  <p><a href="#" target="_blank">付林的个人博客</a> <a href="/"></a></p>
</footer>
<a href="#" class="cd-top">Top</a>
  <script src="{{asset('js')}}/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="{{asset('static')}}/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script>
      //Demo
      layui.use(['form'], function() {
        var form = layui.form();
        form.render();

      });
    </script>
    <script type="text/javascript">
            layui.use(['layer'], function() {
            var layer = layui.layer;
        var msg=$("#msg").text();
        if (msg == "添加成功") {
            layer.msg('评论成功了~');
                        var index = parent.layer.getFrameIndex(window.name);
                setTimeout(function(){
                  parent.layer.close(index);//关闭弹出层
                  parent.location.reload();//更新父级页面（提示：如果需要跳转到其它页面见下文）
                }, 1000);
            }
          });

    </script>
    <script type="text/javascript">
        var ue = UE.getEditor('ue-container');
        ue.ready(function(){
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
        });
    </script>
</body>
</html>



