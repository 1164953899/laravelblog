<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use Illuminate\Http\Request;

class CategoryController {
	/**
	 * 呈现分类添加的表单
	 */
	public function add() {
		$arr = Category::getCategoryByFid();

		return view('admin.category.add', ['arr' => $arr]);
	}
	/**
	 * 保存文章分类进表category
	 * @return [type] [description]
	 */
	public function save(Request $request) {
		$arr = $request->all();

		$re = Category::create($arr); //配合属性fillable
		if (is_object($re)) {
			$message = "保存成功";
		} else {
			$message = "保存失败";
		}
		return redirect()->back()->with('message', $message);
	}
	/**
	 * 呈现分类的列表
	 * @return [type] [description]
	 */
	public function oper() {
		$arr = Category::getCategoryByFid();
		return view('admin.category.oper', ['arr' => $arr]);
	}

	public function update($id) {
		//根据id，获取分类记录
		$ob = Category::where('id', $id)->first();
		//获取所有的分类
		$arr = Category::getCategoryByFid();

		return view('admin.category.update', ['ob' => $ob, 'arr' => $arr]);
	}

	public function usave(Request $request) {
		$arr = $request->all();
		$id = $arr['id'];
		unset($arr['_token']);
		$re = Category::where('id', $id)->update($arr);
		$message = $re ? "修改成功" : "修改失败";
		return redirect()->back()->with('message', $message);
	}

	public function delete($category_id) {
		//判断被删除的分类是否有子分类
		$num = Category::where('fid', $category_id)->count(); //获取子分类的个数

		if ($num == 0) {
			$res = Category::where('id', $category_id)->delete();
			if ($res) {
				$data = [
					'status' => 0,
					'msg' => '删除成功',
				];
			}

		} else {
			$data = [
				'status' => 1,
				'msg' => '请先删除子类',
			];
		}
		return $data;

	}

}
