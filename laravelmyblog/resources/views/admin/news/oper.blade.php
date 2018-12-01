@extends('layouts/admintwo')
{{-- 重写区块main --}}
@section('title',"博客列表")
@section('main')
<div class="wrap-container clearfix">
				<div class="column-content-detail">
						<div class="layui-form-item">
							<div class="layui-inline tool-btn">
								<button class="layui-btn layui-btn-small layui-btn-normal addBtn" id="add"><i class="layui-icon">&#xe654;</i></button>
								<button class="layui-btn layui-btn-small layui-btn-danger delBtn"  data-url="article-add.html"><i class="layui-icon">&#xe640;</i></button>
								<button class="layui-btn layui-btn-small layui-btn-warm listOrderBtn hidden-xs" data-url="article-add.html"><i class="iconfont">&#xe656;</i></button>
							</div>
							<div class="layui-inline">
							<form class="layui-form" action="{{url('admin/news/oper')}}" method="get">
							<div class="layui-inline">
								<input type="text" name="k" value="@if(isset($_GET['k'])){{$_GET['k']}}@endif" autocomplete="off" class="layui-input" placeholder="搜索发布人、标题、分类">
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
								<col class="hidden-xs" width="100">
								<col class="hidden-xs" width="100">
								<col>
								<col width="200">
								<col width="150">
							</colgroup>
							<thead>
								<tr>
									<th><input type="checkbox"  name="" lay-skin="primary" lay-filter="allChoose"></th>
									<th class="hidden-xs">ID</th>
									<th class="hidden-xs">发布人</th>
									<th class="hidden-xs">标题</th>
									<th class="hidden-xs">分类</th>
									<th class="hidden-xs">是否上线</th>
									<th class="hidden-xs">是否推荐</th>
									<th class="hidden-xs">创建时间</th>
									<th width="100px" class="hidden-xs">操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($cols as $v)
								<tr>
									<td><input type="checkbox" name="" lay-skin="primary" data-id="1"></td>
									<td class="hidden-xs">{{$v->id}}</td>
									<td class="hidden-xs">{{$v->username}}</td>
									<td class="hidden-xs">{{$v->title}}</td>
									<td class="hidden-xs">{{$v->cname}}</td>

									@if($v->online == 1)
									<td class="hidden-xs" style="color:green">上线</td>
									@else
									<td class="hidden-xs" style="color: red">未上线</td>
									@endif
									@if($v->recommend == 1)
									<td class="hidden-xs" style="color:green">推荐</td>
									@else
									<td class="hidden-xs" style="color: red">未推荐</td>
									@endif

									<td class="hidden-xs">{{$v->created}}</td>
									<td>
										<div class="layui-inline">
											<button class="layui-btn layui-btn-small layui-btn-normal go-btn" onclick="updatenews({{$v->id}})"><i class="layui-icon">&#xe642;</i></button>
											<button class="layui-btn layui-btn-small layui-btn-danger del-btn" onclick="delnews({{$v->id}})"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div style="margin:0 auto">{{$cols->appends($_GET)->links()}}</div>
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
				    title: '添加博客',
				    area: ['1000px', '630px'],
				    content:'{{url("admin/news/add")}}',
				  });
		});

	function delnews(news_id)
        {
            layer.confirm('您确定要删除我吗？', {
                btn: ['确定', '取消'],
            }, function() {

               $.post("{{url('admin/news/delete') }}/" + news_id, {
                   "_token": "{{ csrf_token() }}",
                   "_method": "delete"
               }, function(data) {
                   if (data.status == 0) {
                       layer.msg(data.msg, { icon: 6});

                       setTimeout(function(){
                        location.href = "{{ url('admin/news/oper') }}";
                    },1000);

                   } else {
                       layer.msg(data.msg, { icon: 5});
                   }
               });
            }, function() {});
        }

        function updatenews(news_id){
    	layer.open({
				    type: 2,
				    title: '修改分类',
				    area: ['1000px', '630px'],
				    content:'{{url("admin/news/update")}}/'+news_id,
				 });
    }
</script>
@endsection