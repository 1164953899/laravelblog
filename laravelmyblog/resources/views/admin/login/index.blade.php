<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>后台管理平台</title>
  <link rel="stylesheet" media="screen" href="{{asset('css')}}/style2.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css')}}/reset.css"/>
</head>
<body>
<div id="particles-js">
		<div class="login">
		<form action="{{url('admin/login/check')}}" method="post">
			<div class="login-top">
				后台管理平台
			</div>
			<div class="login-center clearfix">
				<div class="login-center-img"><img src="{{asset('img')}}/name.png"/></div>
				<div class="login-center-input">
					<input type="text" name="username" value="" placeholder="请输入您的用户名" onfocus="this.placeholder=''" />
					<div class="login-center-input-text">用户名</div>
				</div>
			</div>
			<div class="login-center clearfix">
				<div class="login-center-img"><img src="{{asset('img')}}/password.png"/></div>
				<div class="login-center-input">
					<input type="password" name="password" value="" placeholder="请输入您的密码" onfocus="this.placeholder=''" onblur="this.placeholder='请输入您的密码'" onblur="getName()" />
					<div class="login-center-input-text">密码</div>
				</div>
			</div>
			@if(session()->has('message'))
     		 <div id="msg" style="color: red;font-size: 13px;margin-left: 80px;">{{session()->get('message')}}<b id='s'>3</b></div>
			@endif
			<div>
			<input type="submit" id="button" class="login-button" style="margin-left: 50px;border: none; ">
			{{csrf_field()}}
			</div>

			</form>
		</div>
		<div class="sk-rotating-plane">
		</div>
</div>

<!-- scripts -->
<script src="{{asset('js')}}/particles.min.js"></script>
<script src="{{asset('js')}}/app1.js"></script>
	<script type="text/javascript" src="{{asset('')}}js/jquery-3.3.1.js"></script>
<script type="text/javascript">
var num=3;//计数
function fun1(){
  num--;
  if(num == 0){
    $('#msg').hide(1000);
  }else{
    $("#s").html(num);
    setTimeout(fun1,1000);
  }
}
setTimeout(fun1,1000)
</script>

</body>
</html>