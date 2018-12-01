<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function login() {

		return view('home/user/login');

	}

	public function dologin(Request $request) {

		$password = $request->get('password');
		$username = $request->get('username');

		$res = User::where('username', $username)->where('password', md5($password))->first();

		if ($request->get('captcha') === session()->get('captcha', null)) {

			if (is_object($res)) {

				session(['username' => $username]);
				session(['userid' => $res->id]);

				return redirect()->back()->with('message', "登录成功");

			} else {

				return redirect()->back()->with('message', "登录失败");

			}

		} else {
			return redirect()->back()->with('message', "验证码错误");
		}

	}

	public function logout() {

		session(['userid' => null]);
		session(['username' => null]);
		return redirect(url('/'))->with('message', "退出成功");
	}

	public function add() {

		return view('home/user/add');
	}

	public function doadd(Request $request) {

		$this->validate($request, [
			'username' => ['required', 'unique:blog_user'],
			'password' => ['required', 'confirmed'],
			'password_confirmation' => ['required', 'regex:/^\S{6,20}$/'],
			'email' => 'email|nullable',
			'phone' => ['regex:/^1[35789]\d{9}$/', 'nullable'],
			'age' => ['integer', 'between:18,40', 'nullable'],
		], [
			'username.required' => '请输入用户名',
			'username.unique' => '用户名已经存在，哥',
			'password.confirmed' => '两次密码不一致',
			'password.required' => '确认密码不能为空',
			'password_confirmation.required' => '请填写密码',
			'password_confirmation.regex' => '密码格式错误',
			'email.email' => '邮箱格式错误',
			'phone.regex' => '电话格式错误',
			'age.integer' => '请输入合法年龄值',
			'age.between' => '年龄应在18-40间',
		]);

		//验证码是否正确
		if ($request->get('captcha') === session()->get('captcha', null)) {
			$password = $request->get('password');
			$arr = $request->all();
			$arr['password'] = md5($password);
			$arr['admin'] = 0;
			$re = User::create($arr);
			$message = $re ? '添加成功了' : '注册失败';
			return redirect()->back()->with('message', $message);
		} else {
			return redirect()->back()->with('message', "验证码错误");
		}

	}

}