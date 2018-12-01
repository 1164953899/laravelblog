<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>添加分类</title>
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="{{asset('static')}}/admin/css/admin.css" />
	</head>
	<body>
		<div class="wrap-container">
					@if(session()->has('message'))
					<span id="msg" style="color: green;margin-left: 30px;font-size: 0px">{{session()->get('message')}}</span>
					@endif
				<form class="layui-form" action="{{url('admin/photo/save')}}" method="post" enctype="multipart/form-data" style="width: 90%;padding-top: 20px;">

					<div class="layui-form-item">
						<label class="layui-form-label">相册名称：</label>
						<div class="layui-input-block">
							<input type="text" name="title" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">相册封面：</label>
						<div class="layui-input-block">
							<input type="file" name="upload" required lay-verify="required" autocomplete="off" class="layui-input" style="border: 2px solid #62D3F8">
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">相册简介：</label>
						<div class="layui-input-block">
							<input type="text" name="content" required lay-verify="required" placeholder="请输入简介" autocomplete="off" class="layui-input">
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

</script>
<script type="text/javascript">
				layui.use(['layer'], function() {
				var layer = layui.layer;
		var msg=$("#msg").text();
		if (msg == "添加成功") {
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