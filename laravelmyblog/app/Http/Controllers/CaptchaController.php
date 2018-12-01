<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController {
	
	public function index() {
		//生成验证码
		$builder = new CaptchaBuilder;
		$builder->build();
		//把图片上的内容写入到session中
		session()->put('captcha', $builder->getPhrase());
		//输出
		header('Content-type: image/jpeg');
		$builder->output();
	}
}
