<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
	protected $table = "blog_photo";
	public $timestamps = true;
	protected $fillable = ['title', 'content', 'image'];
	const UPDATED_AT = "updated";
	const CREATED_AT = "created";
}