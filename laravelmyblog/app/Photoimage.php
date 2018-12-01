<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoimage extends Model {
	protected $table = "blog_photoimage";
	public $timestamps = false;
	protected $fillable = ['path', 'photoid'];
}