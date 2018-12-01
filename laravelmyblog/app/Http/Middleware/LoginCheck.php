<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheck {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (session()->get('userid')) {
			return $next($request); //继续
		} else {
			//没有登录要跳转，到登录页
			return redirect(url('admin/login/index'))->with('message', '请登录');
		}

	}
}
