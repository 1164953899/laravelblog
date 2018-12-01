<?php
namespace App\Http\Controllers\home;
use App\Category;
use App\News;
use App\Photo;

class IndexController {

	public function index() {
		//查询相册
		$photo = Photo::limit(6)->orderBy('created','desc')->get();
		//查询顶级分类
		$category = Category::where('fid', 0)->get();
		//查询推荐文章(上线且推荐)
		$recommend = News::where('online',1)
				->where('recommend',1)
				->orderBy('created','desc')
				->limit(7)
				->get();

		//获取文章列表
		$news = News::where('online',1)
			->join('blog_category', 'blog_news.cid', '=', 'blog_category.id')
			->join('blog_user', 'blog_news.uid', '=', 'blog_user.id')
			->select('blog_news.*', 'blog_category.cname', 'blog_user.username')
				->orderBy('created','desc')
				->paginate(9);

		return view('home/index/index',['category' => $category,'recommend'=> $recommend,'news'=>$news,'photo'=>$photo]);
	}

}