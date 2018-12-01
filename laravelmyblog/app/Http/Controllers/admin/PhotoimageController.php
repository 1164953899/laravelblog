<?php
namespace App\Http\Controllers\Admin;
use App\Photo;
use App\Photoimage;
use Illuminate\Http\Request;

class PhotoimageController {

	public function add($photoid) {

		return view('admin/photoimage/add', ['photoid' => $photoid]);
	}

	public function save(Request $request) {

		$arr = $request->all();

		if (isset($arr['upload'])) {

			foreach ($arr['upload'] as $key => $value) {

				$path = $value->store('images', 'my');
				$arr['path'] = $path;
				$re = Photoimage::create($arr);
				$message = $re ? '添加成功' : '添加失败';
			}
		}

		return redirect()->back()->with('message', $message);
	}

	public function delete($photo_id) {

		$res = Photo::where('id', $photo_id)->delete();

		$re = Photoimage::where('photoid', $photo_id)->delete();

		if ($res || $re) {

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

	public function oper($photo_id) {

		$res = Photoimage::where('photoid', $photo_id)->get();

		return view('admin/photoimage/oper', ['images' => $res]);
	}
}