@extends('layouts/admintwo')
{{-- 重写区块main --}}
@section('title',"评论管理")
@section('main')
<div class="wrap-container clearfix">
				<div class="column-content-detail">
						<div class="layui-form-item">
							<div class="layui-inline tool-btn">
								<button class="layui-btn layui-btn-small layui-btn-normal addBtn"><i class="layui-icon">&#xe654;</i></button>
								<button class="layui-btn layui-btn-small layui-btn-danger delBtn"  data-url="article-add.html"><i class="layui-icon">&#xe640;</i></button>
								<button class="layui-btn layui-btn-small layui-btn-warm listOrderBtn hidden-xs" data-url="article-add.html"><i class="iconfont">&#xe656;</i></button>
							</div>
							<div class="layui-inline">
							<form class="layui-form" action="#" method="get">
							<div class="layui-inline">
								<input type="text" name="k" value="@if(isset($_GET['k'])){{$_GET['k']}}@endif" autocomplete="off" class="layui-input" placeholder="搜索">
							</div>
							<button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
							</form>
						</div>
					<div class="layui-form" >
						<table class="layui-table" lay-even lay-skin="nob" >
							<colgroup>
								<col width="50">
								<col class="hidden-xs" width="50">
								<col class="hidden-xs" width="80">
								<col class="hidden-xs" width="200">
								<col>
								<col width="200">
								<col width="150">
							</colgroup>
							<thead>
								<tr>
									<th><input type="checkbox"  name="" lay-skin="primary" lay-filter="allChoose"></th>
									<th class="hidden-xs">ID</th>
									<th class="hidden-xs">姓名</th>
									<th class="hidden-xs">联系方式</th>
									<th class="hidden-xs">评论内容</th>
									<th class="hidden-xs">创建时间</th>
									<th width="100px" class="hidden-xs">操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($comment as $v)
								<tr style="text-align: center;">
									<td><input type="checkbox" name="" lay-skin="primary" data-id="1"></td>
									<td class="hidden-xs">{{$v->id}}</td>
									<td class="hidden-xs">{{$v->name}}</td>
									<td class="hidden-xs">{{$v->email}}</td>
									<td class="hidden-xs" height="50px;">{!!html_entity_decode($v->content) !!}</td>
									<td class="hidden-xs">{{$v->create}}</td>
									<td>
										<div class="layui-inline">
											<button class="layui-btn layui-btn-small layui-btn-danger del-btn" onclick="delcomment({{$v->id}})"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div style="margin:0 auto">{{$comment->appends($_GET)->links()}}</div>
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

	function delcomment(comment_id)
        {
            layer.confirm('您确定要删除我吗？', {
                btn: ['确定', '取消'],
            }, function() {

               $.post("{{url('admin/comment/delete') }}/" + comment_id, {
                   "_token": "{{ csrf_token() }}",
                   "_method": "delete"
               }, function(data) {
                   if (data.status == 0) {
                       layer.msg(data.msg, { icon: 6});

                       setTimeout(function(){
                        location.href = "{{ url('admin/comment/oper') }}";
                    },1000);

                   } else {
                       layer.msg(data.msg, { icon: 5});
                   }
               });
            }, function() {});
        }


</script>
@endsection