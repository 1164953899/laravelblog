<?php
namespace App\Http\Controllers\home;
use App\Category;
use App\Photoimage;
use App\Photo;

class PhotoController {

	public function oper(){
		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		$photo = Photo::orderBy('created','desc')->paginate(20);

		return view('home/photo/oper',['category'=>$category,'photo'=>$photo]);

	}

	public function detail($id){
		//查询顶级分类
		$category = Category::where('fid', 0)->get();

		$photo = Photoimage::where('photoid',$id)->get();

		return view('home/photo/detail',['category'=>$category,'photo'=>$photo]);
	}
}