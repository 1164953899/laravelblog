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
		<link rel="stylesheet" href="{{asset('css')}}/reset2.css" media="screen" />
		<link rel="stylesheet" href="{{asset('css')}}/jq22.css" media="screen" />
		<link rel="stylesheet" href="{{asset('css')}}/css3_3d.css" media="screen" />
		<script type="text/javascript" src="{{asset('js')}}/modernizr.js"></script>
		<script src="{{asset('static')}}/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
	</head>
		@yield('main')
		@yield('script')
	</body>
</html>
