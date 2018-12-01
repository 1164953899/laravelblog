<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController {

	public function index() {

		return view('admin/login/index');
	}

	public function check(Request $request) {

		$password = $request->get('password');
		$username = $request->get('username');

		$res = DB::table('blog_user')->where('username', $username)->where('password', md5($password))->where('admin', 1)->first();

		if (is_object($res)) {

			session(['username' => $username]);
			session(['userid' => $res->id]);

			return redirect(url('admin'))->with('message', "登录成功");
			
		} else {

			return redirect(url('admin/login/index'))->with('message', "登录失败，用户名或密码错误");
		}
	}
}