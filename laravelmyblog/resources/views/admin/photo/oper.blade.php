@extends('layouts/admintwo')
{{-- 重写区块main --}}
@section('title',"相册分类")
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
				</div>
			<div id="container" style="margin-top:-60px;">
				<ul id="grid" class="group" style="width: 100%">
				@foreach($photo as $v)
				<li style="margin-top: 30px;margin-left:30pxs">
				<div class="details">
				<h3>{{$v['title']}}</h3>
				<a class="more" onclick="addimage({{$v['id']}})" style="margin-right: 80px">添加</a>
				<a class="more" href="{{url('admin/photoimage/oper',['id'=>$v['id']])}}" style="margin-right: 40px">查看</a>
				<a class="more" onclick="delimage({{$v['id']}})">删除</a> </div>
				<a class="more" href="#info1"><img src="{{asset('upload')}}/{{$v['image']}}" width="280px" /></a>
				</li>
				@endforeach
				</ul>
			</div>
</div>
<div style="margin-left: 40%;">{{$photo->appends($_GET)->links()}}</div>
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
				    title: '添加相册',
				    area: ['500px', '300px'],
				    content:'{{url("admin/photo/add")}}',
			});
		});

		 function addimage(photo_id){
	    	layer.open({
					    type: 2,
					    title: '添加照片',
					    area: ['500px', '200px'],
					    content:'{{url("admin/photoimage/add")}}/'+photo_id,
					 });
	    }

	    function delimage(photo_id){

	    	 layer.confirm('您确定要删除我吗？', {
                btn: ['确定', '取消'],
            }, function() {

               $.post("{{url('admin/photoimage/delete') }}/" + photo_id, {
                   "_token": "{{ csrf_token() }}",
                   "_method": "delete"
               }, function(data) {
                   if (data.status == 0) {
                       layer.msg(data.msg);
                       setTimeout(function(){
                        location.href = "{{ url('admin/photo/oper') }}";
                    },1000);
                   } else {
                       layer.msg(data.msg);
                   }
               });
            }, function() {});
	    }
</script>
@endsection