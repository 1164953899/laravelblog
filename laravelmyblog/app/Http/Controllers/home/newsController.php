<?php
namespace App\Http\Controllers\home;
use App\Category;
use App\News;

class NewsController {

	public function oper($id) {

		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		//查询子分类
		$blogcategory = Category::where('fid', $id)->get();

		$id = [];
		foreach ($blogcategory as $v) {
			$id[] = $v->id;
		}

		//查询推荐文章(上线且推荐)
		$recommend = News::where('online', 1)
			->where('recommend', 1)
			->whereIn('cid', $id)
			->orderBy('created', 'desc')
			->limit(7)
			->get();

		$check = News::where('online', 1)
			->whereIn('cid', $id)
			->orderBy('view', 'desc')
			->limit(7)
			->get();

		//获取文章列表
		$news = News::where('online', 1)
			->whereIn('cid', $id)
			->join('blog_category', 'blog_news.cid', '=', 'blog_category.id')
			->join('blog_user', 'blog_news.uid', '=', 'blog_user.id')
			->select('blog_news.*', 'blog_category.cname', 'blog_user.username')
			->orderBy('created', 'desc')
			->paginate(5);

		return view('home/news/oper', ['category' => $category, 'blogcategory' => $blogcategory, 'recommend' => $recommend, 'news' => $news, 'check' => $check]);
	}

	public function sonoper($id) {

		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		$re = Category::where('id', $id)->first();

		$fid = $re->fid;
		//查询标签云

		$blogcategory = Category::where('fid', $fid)->get();

		//查询推荐文章(上线且推荐)
		$recommend = News::where('online', 1)
			->where('recommend', 1)
			->where('cid', $id)
			->orderBy('created', 'desc')
			->limit(7)
			->get();

		//查询点击排行（上线）
		$check = News::where('online', 1)
			->where('cid', $id)
			->orderBy('view', 'desc')
			->limit(7)
			->get();

		//获取文章列表
		$news = News::where('online', 1)
			->where('cid', $id)
			->join('blog_category', 'blog_news.cid', '=', 'blog_category.id')
			->join('blog_user', 'blog_news.uid', '=', 'blog_user.id')
			->select('blog_news.*', 'blog_category.cname', 'blog_user.username')
			->orderBy('created', 'desc')
			->paginate(5);

		return view('home/news/sonoper', ['category' => $category, 'blogcategory' => $blogcategory, 'recommend' => $recommend, 'news' => $news, 'check' => $check]);

	}

	public function detail($id) {
		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		//查文章详情
		$news = News::where('blog_news.id', $id)
			->join('blog_category', 'blog_news.cid', '=', 'blog_category.id')
			->join('blog_user', 'blog_news.uid', '=', 'blog_user.id')
			->select('blog_news.*', 'blog_category.cname', 'blog_user.username')
			->first();

		$fid = $news->cid;
		$blogcategory = Category::where('id', $fid)->first();
		$ffid = $blogcategory->fid;

		//查询标签云
		$babacategory = Category::where('fid', $ffid)->get();

		//查询推荐文章(上线且推荐)
		$recommend = News::where('online', 1)
			->where('recommend', 1)
			->where('cid', $fid)
			->orderBy('created', 'desc')
			->limit(7)
			->get();

		//查询点击排行（上线）
		$check = News::where('online', 1)
			->where('cid', $fid)
			->orderBy('view', 'desc')
			->limit(7)
			->get();

		//浏览量+1
		$re = News::where('id', $id)->increment('view');

		return view('home/news/detail', ['news' => $news, 'category' => $category, 'recommend' => $recommend, 'check' => $check, 'babacategory' => $babacategory]);

	}

}