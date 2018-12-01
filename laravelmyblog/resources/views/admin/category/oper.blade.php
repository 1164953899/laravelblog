@extends('layouts/admintwo')
{{-- 重写区块main --}}
@section('title',"文章分类")
@section('main')
<div class="wrap-container clearfix">
					@if(session()->has('message'))
					<span id="msg" style="color: green;margin-left: 30px;font-size: 0px">{{session()->get('message')}}</span>
					@endif
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
								<col class="hidden-xs" width="150">
								<col>
								<col class="hidden-xs" width="200">
								<col width="200">
							</colgroup>
							<thead>
								<tr>
									<th class="hidden-xs">ID</th>
									<th class="hidden-xs">分类名称</th>
									<th width="100px" class="hidden-xs">操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($arr as $v)
								<tr>
									<td class="hidden-xs">{{$v['id']}}</td>
									<td class="hidden-xs">{{$v['showname']}}</td>
									<td>
										<div class="layui-inline">
											<button class="layui-btn layui-btn-small layui-btn-normal go-btn" onclick="updatecategory({{$v['id']}})"><i class="layui-icon">&#xe642;</i></button>
											<button class="layui-btn layui-btn-small layui-btn-danger del-btn" onclick="delcategory({{$v['id']}})"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
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
				    title: '添加分类',
				    area: ['400px', '250px'],
				    content:'{{url("admin/category/add")}}',
				  });
		});

	function delcategory(category_id)
        {
            layer.confirm('您确定要删除我吗？', {
                btn: ['确定', '取消'],
            }, function() {
               $.post("{{url('admin/category/delete') }}/" + category_id, {
                   "_token": "{{ csrf_token() }}",
                   "_method": "delete"
               }, function(data) {
                   if (data.status == 0) {
                       layer.msg(data.msg, { icon: 6});
                       setTimeout(function(){
                       location.href = "{{ url('admin/category/oper') }}";
                   },1000);
                   } else {
                       layer.msg(data.msg, { icon: 5});
                   }
               });
            }, function() {});
        }

    function updatecategory(category_id){
    	layer.open({
				    type: 2,
				    title: '修改分类',
				    area: ['400px', '250px'],
				    content:'{{url("admin/category/update")}}/'+category_id,
				 });
    }

</script>
@endsection