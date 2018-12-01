<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>网站后台管理模版</title>
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/css/admin.css" />
	</head>
	<body>
		<div class="wrap-container">
					@if(session()->has('message'))
					<span id="msg" style="color: green;margin-left: 30px;font-size: 0px">{{session()->get('message')}}</span>
					@endif
				<form class="layui-form" action="{{url('home/user/dologin')}}" method="post" style="width: 90%;padding-top: 20px;">
					<div class="layui-form-item">
						<label class="layui-form-label">用户名：</label>
						<div class="layui-input-block">
							<input type="text" name="username" required lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">密码：</label>
						<div class="layui-input-block">
							<input type="password"  name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">验证码：</label>
						<div class="layui-input-block">
							<input type="text" size=5 name='captcha' class="layui-input">
							<br>
							<img src="{{url('captcha')}}" id="captcha">
						</div>
					</div>
					<div class="layui-form-item">
						<div class="layui-input-block">
							{{csrf_field()}}
							<button  class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
							<button type="reset" class="layui-btn layui-btn-primary">重置</button>
						</div>
					</div>
				</form>
		</div>
		<script src="{{asset('js')}}/jquery-3.3.1.js" type="text/javascript"></script>
		<script src="{{asset('static')}}/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script>
			//Demo
			layui.use(['form'], function() {
				var form = layui.form();
				form.render();

			});

		$("#captcha").click(function(){
		$(this).prop('src', "{{url('captcha')}}?rand="+Math.random());

	});

</script>
<script type="text/javascript">
		layui.use(['layer'], function() {
				var layer = layui.layer;
				var msg=$("#msg").text();

		if (msg == "登录失败") {

				layer.msg('用户名或密码错误');
			}else if (msg == "验证码错误") {
				layer.msg('验证码错误');
			}else if (msg == "登录成功") {
       			 layer.msg('登录成功');
	           var index = parent.layer.getFrameIndex(window.name);
	            setTimeout(function(){
	              parent.layer.close(index);//关闭弹出层
	              parent.location.reload();//更新父级页面（提示：如果需要跳转到其它页面见下文）
	            }, 2000);
       		 }
			});

			</script>
	</body>

</html>