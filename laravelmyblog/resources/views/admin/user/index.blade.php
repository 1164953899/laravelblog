@extends('layouts/admintwo')
{{-- 重写区块main --}}
@section('title',"用户列表")
@section('main')
<div class="wrap-container clearfix">
				<div class="column-content-detail">
					<form class="layui-form" action="">
						<div class="layui-form-item">
							<div class="layui-inline tool-btn">
								<button class="layui-btn layui-btn-small layui-btn-normal addBtn" data-url="article-add.html" id="add"><i class="layui-icon">&#xe654;</i></button>
								<button class="layui-btn layui-btn-small layui-btn-danger delBtn"  data-url="article-add.html"><i class="layui-icon">&#xe640;</i></button>
								<button class="layui-btn layui-btn-small layui-btn-warm listOrderBtn hidden-xs" data-url="article-add.html"><i class="iconfont">&#xe656;</i></button>
							</div>
							<div class="layui-inline">
								<input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
							</div>
							<button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
						</div>
					</form>
					<div class="layui-form">
						<table class="layui-table" lay-even lay-skin="nob" >
							<colgroup>
								<col width="50">
								<col class="hidden-xs" width="100">
								<col class="hidden-xs" width="100">
								<col class="hidden-xs" width="150">
								<col class="hidden-xs" width="150">
								<col>
								<col class="hidden-xs" width="150">
								<col width="80">
								<col width="200">
							</colgroup>
							<thead>
								<tr>
									<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
									<th class="hidden-xs">ID</th>
									<th class="hidden-xs">用户名</th>
									<th class="hidden-xs">性别</th>
									<th class="hidden-xs">手机号</th>
									<th class="hidden-xs">邮箱</th>
									<th class="hidden-xs">权限</th>
									<th width="100px" class="hidden-xs">操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($user as $v)
								<tr>
									<td><input type="checkbox" name="" lay-skin="primary" data-id="1"></td>
									<td class="hidden-xs">{{$v->id}}</td>
									<td class="hidden-xs">{{$v->username}}</td>
									@if($v->sex==1)
									<td class="hidden-xs">男</td>
									@else
									<td class="hidden-xs">女</td>
									@endif
									<td class="hidden-xs">{{$v->phone}}</td>
									<td class="hidden-xs">{{$v->email}}</td>
									@if($v->admin == 1)
									<td class="hidden-xs" style="color:green">管理员</td>
									@else
									<td class="hidden-xs">普通用户</td>
									@endif
									<td>
										<div class="layui-inline">
											<button class="layui-btn layui-btn-small layui-btn-normal go-btn" data-id="1" data-url="article-detail.html"><i class="layui-icon">&#xe642;</i></button>
											<button class="layui-btn layui-btn-small layui-btn-danger del-btn" onclick="delUser({{$v->id}})"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div style="margin:0 auto">{{$user->appends($_GET)->links()}}</div>
					</div>
				</div>
		</div>
@endsection

@section('script')
<script src="{{asset('js')}}/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">
layui.use(['form','layer'], function() {
				var form = layui.form();
				form.render();
			});

		$('#add').on('click', function(){
				layer.open({
				    type: 2,
				    title: '添加用户/管理员',
				    area: ['500px', '560px'],
				    content:'{{url("admin/user/add")}}',
				  });
		});

	function delUser(user_id)
        {
            layer.confirm('您确定要删除我吗？', {
                btn: ['确定', '取消'],
            }, function() {
               $.post("{{url('admin/user/delete') }}/" + user_id, {
                   "_token": "{{ csrf_token() }}",
                   "_method": "delete"
               }, function(data) {
                   if (data.status == 0) {
                       layer.msg(data.msg, { icon: 6});
                       setTimeout(function(){
                       location.href = "{{ url('admin/user/index') }}";
                       	},1000);
                   } else {
                       layer.msg(data.msg, { icon: 5});
                   }
               });
            }, function() {});
        }
</script>
@endsection