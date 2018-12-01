<?php
namespace App\Http\Controllers\home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Photo;
use App\Comment;

class ContentController extends Controller  {

	public function index(){
		//查询相册
		$photo = Photo::limit(6)->orderBy('created','desc')->get();
		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		//查询评论
		$comment = Comment::orderBy('create','desc')->paginate(5);

		return view('home/content/index',['photo'=>$photo,'category'=>$category,'comment'=>$comment]);
	}

		public function save(Request $request) {

		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'content' => 'required',
		],
			[
				'name.required' => '姓名不能为空',
				'email.required' => '联系方式不能为空',
				'content.required' => '内容不能为空'
			]
		);

		$arr = $request->all();

		$arr['create']=date("Y-m-d H:i:s");
		
		$ob = Comment::create($arr);
		if ($ob) {
			$message = "添加成功";
		} else {
			$message = "添加失败";
		}
		return redirect()->back()->with('message', $message);
	}

}