<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller {

	public function add() {

		$cols = Category::getCategoryByFid();
		return view('admin.news.add', ['cols' => $cols]);

	}
	public function save(Request $request) {
		$this->validate($request, [
			'title' => 'required',
			'content' => 'required',
		],
			[
				'title.required' => '标题不能为空',
				'content.required' => '内容不能为空',
			]
		);
		$arr = $request->all();

		if (isset($arr['upload'])) {
			$path = $arr['upload']->store('image', 'my');
		}

		$arr['uid'] = session()->get('userid');
		$arr['image'] = $path;
		$ob = News::create($arr);
		if (is_object($ob)) {
			$id = $ob->id; //获取主键id值
			$message = "添加成功";
		} else {
			$message = "添加失败";
		}
		return redirect()->back()->with('message', $message);
	}

	public function oper(Request $request) {

		$k = $request->get('k', ''); //第二个参数代表没有传值k，‘’起作用
		$news = new News(); //实例化了数据模型类News
		if (!empty($k)) {
			//表单给传值了，要进行模糊查询,指定查询的条件
			$news = $news->where('title', 'like', "%{$k}%")
				->orwhere('blog_category.cname', 'like', "%{$k}%")
				->orwhere('blog_user.username', 'like', "%{$k}%");
		}

		$news = $news->join('blog_category', 'blog_news.cid', '=', 'blog_category.id')
			->join('blog_user', 'blog_news.uid', '=', 'blog_user.id')
			->select('blog_news.*', 'blog_category.cname', 'blog_user.username')
			->orderBy('created', 'desc');

		$cols = $news->paginate(5);

		return view('admin.news.oper', ['cols' => $cols]);

	}

	public function delete($news_id) {

		$res = News::where('id', $news_id)->delete();

		if ($res) {
			$data = [
				'status' => 0,
				'msg' => '删除成功',
			];
		} else {
			$data = [
				'status' => 1,
				'msg' => '删除失败',
			];
		}

		return $data;
	}

	public function update($id) {
		//获取所有的分类信息
		$cols = Category::getCategoryByFid();

		//根据id，获取文章记录
		$ob = News::where('id', $id)->first();
		return view('admin/news/update', ['ob' => $ob, 'cols' => $cols]);
	}

	public function usave(Request $request) {
		$arr = $request->all();
		$id = $arr['id'];
		unset($arr['_token']);
		$re = News::where('id', $id)->update($arr);
		$message = $re ? '修改成功' : "修改失败";
		return redirect()->back()->with('message', $message);
	}
}
