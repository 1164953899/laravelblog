<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {
	protected $table = "blog_news";
	protected $fillable = ['uid', 'cid', 'title','image','content', 'view', 'recommend', 'online'];
	public $timestamps = true;
	const UPDATED_AT = 'updated';
	const CREATED_AT = 'created';
}
