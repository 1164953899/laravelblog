<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = "blog_category";
	public $timestamps = false;
	protected $fillable = ['cname', 'fid'];
	/**
	 * 获取一级分类
	 * @param  integer $fid 父分类id $num 代表函数第几次被调用
	 * @return array
	 */
	public static function getCategoryByFid($fid = 0, $num = 0, $fstr = '') {
		$cols = self::where('fid', $fid)->get();
		$arr = [];
		//产生--
		$str = str_repeat('--', $num);
		$num++;
		foreach ($cols as $v) {
			$arr[] = ['id' => $v->id, 'fstr' => $fstr, 'showname' => $str . $v->cname, 'cname' => $v->cname, 'fid' => $v->fid];
			//自己调用自己，就能找第二级
			$sonArr = self::getCategoryByFid($v->id, $num, $fstr . '>' . $v->id);
			//把子分类也放到数组arr中
			$arr = array_merge($arr, $sonArr);
		}
		return $arr;
	}
}
