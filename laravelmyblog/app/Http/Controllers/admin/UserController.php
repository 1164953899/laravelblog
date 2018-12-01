<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

	/**
	 * 获取用户列表
	 */
	public function index() {

		$user = DB::table('blog_user')->paginate(5);

		return view('admin/user/index', ['user' => $user]);

	}

	public function delete($user_id) {

		$res = DB::table('blog_user')->where('id', $user_id)->delete();
		if ($res) {
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

	public function add() {

		return view('admin/user/add');
	}

	public function save(Request $request) {

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
			$re = User::create($arr);
			$message = $re ? '添加成功了' : '注册失败';
			return redirect()->back()->with('message', $message);
		} else {
			return redirect()->back()->with('message', "验证码错误");
		}

	}
}