<?php
namespace App\Http\Controllers\admin;

class IndexController {

	public function index() {

		return view('admin/index/index');
	}

	public function logout() {
		session(['userid' => null]);
		return redirect(url('admin/login/index'))->with('message', "退出成功");
	}
}