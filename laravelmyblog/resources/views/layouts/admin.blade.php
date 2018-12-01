<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>@yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/css/admin.css"/>
		<script src="{{asset('static')}}/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('static')}}/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="{{asset('static')}}/admin/js/main.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div class="main-layout" id='main-layout'>
			<!--侧边栏-->
			<div class="main-layout-side">
				<div class="m-logo">
				</div>
				<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
				  <li class="layui-nav-item layui-nav-itemed">
				    <a href="javascript:;"><i class="iconfont">&#xe607;</i>用户管理</a>
				    <dl class="layui-nav-child">
				      <dd><a data-url="{{url('admin/user/index')}}" data-id='1' data-text="用户列表"><span class="l-line"></span>用户列表</a></dd>
				    </dl>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe608;</i>文章管理</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="{{url('admin/category/oper')}}" data-id='2' data-text="分类管理"><span class="l-line"></span>文章分类</a></dd>
				      <dd><a href="javascript:;" data-url="{{url('admin/news/oper')}}" data-id='3' data-text="文章列表"><span class="l-line"></span>文章列表</a></dd>
				    </dl>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe604;</i>相册管理</a>
				     <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="{{url('admin/photo/oper')}}" data-id='4' data-text="相册管理"><span class="l-line"></span>相册管理</a></dd>
				    </dl>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe604;</i>评论管理</a>
				     <dl class="layui-nav-child">
				      <dd><a href="javascript:;" data-url="{{url('admin/comment/oper')}}" data-id='5' data-text="评论管理"><span class="l-line"></span>评论管理</a></dd>
				    </dl>
				  </li>
				   <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe60c;</i>友情链接</a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont">&#xe600;</i>备份管理</a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;" data-url="#" data-id='5' data-text="个人信息"><i class="iconfont">&#xe606;</i>个人信息</a>
				  </li>

				</ul>
			</div>
			<!--右侧内容-->
			<div class="main-layout-container">
				<!--头部-->
				<div class="main-layout-header">
					<div class="menu-btn" id="hideBtn">
						<a href="javascript:;">
							<span class="iconfont">&#xe60e;</span>
						</a>
					</div>
					<ul class="layui-nav" lay-filter="rightNav">
					  <li class="layui-nav-item"><a href="#"><i class="iconfont">&#xe603;</i></a></li>
					  <li class="layui-nav-item">
					    <a href="javascript:;">{{session()->get('username')}}</a>
					  </li>
					  <li class="layui-nav-item"><a href="{{url('admin/index/logout')}}">退出</a></li>
					</ul>
				</div>
				<!--主体内容-->
				<div class="main-layout-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
					  <ul class="layui-tab-title">
					    <li class="layui-this welcome">后台主页</li>
					  </ul>
					  <div class="layui-tab-content">
					    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
					    	@yield('main')
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<!--遮罩-->
			<div class="main-mask">

			</div>
		</div>

	</body>
</html>
