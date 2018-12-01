<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/css/admin.css" />
	</head>
	<body>
		<div class="wrap-container">
					@if(session()->has('message'))
					<span id="msg" style="color: green;margin-left: 30px;font-size: 0px">{{session()->get('message')}}</span>
					@endif
				<form class="layui-form" action="{{url('admin/user/save')}}" method="post" style="width: 90%;padding-top: 20px;">
					<div class="layui-form-item">
						<label class="layui-form-label">用户权限:</label>
						<div class="layui-input-block">
							<select name="admin" lay-verify="required">
								<option value="0">普通用户</option>
								<option value="1">管理员</option>
							</select>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">用户名：</label>
						<div class="layui-input-block">
							<input type="text" value="{{old('username')}}" name="username" required lay-verify="required" placeholder="请输入标签" autocomplete="off" class="layui-input">
							<span style="color: red">{{$errors->first('username')}}</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">密码：</label>
						<div class="layui-input-block">
							<input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" required lay-verify="required" placeholder="请输入标签" autocomplete="off" class="layui-input">
							<span style="color: red">{{$errors->first('password_confirmation')}}</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">确认密码：</label>
						<div class="layui-input-block">
							<input type="password" name="password" value="{{old('password')}}" required lay-verify="required" placeholder="请输入标签" autocomplete="off" class="layui-input">
							<span style="color: red">{{$errors->first('password')}}</span>
						</div>
					</div>
					<div class="layui-form-item">
			        <label class="layui-form-label">性别</label>
			        <div class="layui-input-block">
			          		<input type="radio" name="sex" value="1" title="男" checked>
							<input type="radio" name="sex" value="0" title="女">
			        </div>
			    	</div>
					<div class="layui-form-item">
						<label class="layui-form-label">邮箱：</label>
						<div class="layui-input-block">
							<input type="text" name="email" value="{{old('email')}}" required lay-verify="required" placeholder="请输入标签" autocomplete="off" class="layui-input">
							<span style="color: red">{{$errors->first('email')}}</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">手机号：</label>
						<div class="layui-input-block">
							<input type="text" name="phone" value="{{old('phone')}}" required lay-verify="required" placeholder="请输入标签" autocomplete="off" class="layui-input">
							<span style="color: red">{{$errors->first('phone')}}</span>
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
		console.log(msg);
		if (msg == "添加成功了") {
				layer.msg('添加成功了~');
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