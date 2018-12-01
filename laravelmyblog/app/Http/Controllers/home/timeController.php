<?php
namespace App\Http\Controllers\home;
use App\Category;
use App\News;

class TimeController {

	public function index(){
		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		$news = News::where('online','1')
				->orderBy('created','desc')
				->paginate(20);

		return view('home/time/index',['category'=>$category,'news'=>$news]);
	}
}