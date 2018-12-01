<?php
namespace App\Http\Controllers\Admin;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController {

	public function add() {

		return view('admin/photo/add');

	}

	public function save(Request $request) {

		$arr = $request->all();
		$path = '';
		if (isset($arr['upload']) && is_object($arr['upload'])) {
			//有图片,判断文件大小和类型
			$size = $arr['upload']->getClientSize();
			if ($size < 1024 * 1024 * 2) {
				$type = $arr['upload']->getClientMimeType();
				if ($type == 'image/gif' || $type == 'image/png' || $type == 'image/jpeg' || $type == 'image/jpg') {
					//保存图片
					$path = $arr['upload']->store('image', 'my');
				} else {
					$message = "文件格式不符";
				}
			} else {
				$message = "文件过大";
			}
		} else {
			$message = '没有上传图片';
		}
		unset($arr['_token']);
		unset($arr['upload']);
		$arr['image'] = $path;
		$re = Photo::create($arr);
		$message = $re ? '添加成功' : '添加失败';
		return redirect()->back()->with('message', $message);

	}

	public function oper() {

		$res = Photo::orderBy('created', 'desc')->paginate(6);

		return view('admin/photo/oper', ['photo' => $res]);
	}

}