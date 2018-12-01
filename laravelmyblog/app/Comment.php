<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = "blog_comment";
	public $timestamps = false;
	protected $fillable = ['name','email','content','create'];
}
