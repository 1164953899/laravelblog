<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
	protected $table = 'blog_user';
	public $timestamps = true;
	const CREATED_AT = 'create';
	const UPDATED_AT = 'update';
	protected $fillable = ['username', 'password', 'sex', 'email', 'phone', 'admin'];
}
