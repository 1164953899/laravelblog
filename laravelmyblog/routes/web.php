<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::group(['namespace' => 'Home'], function () {
	Route::get('/', "IndexController@index");
	Route::get('home/news/oper/{id}', "NewsController@oper");
	Route::get('home/news/sonoper/{id}', "NewsController@sonoper");
	Route::get('home/news/detail/{id}', "NewsController@detail");
	Route::get('home/photo/oper', "PhotoController@oper");
	Route::get('home/photo/detail/{id}', "PhotoController@detail");
	Route::get('home/time/index', "TimeController@index");
	Route::get('home/content/index', "ContentController@index");
	Route::post('home/content/save', "ContentController@save");

	Route::get('home/user/login', "UserController@login");
	Route::post('home/user/dologin', "UserController@dologin");
	Route::get('home/user/logout', "UserController@logout");
	Route::get('home/user/add', "UserController@add");
	Route::post('home/user/doadd', "UserController@doadd");

});

Route::get('user/reg', "UserController@reg");
Route::post('user/save', "UserController@save");
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'check'], function () {
	Route::get('/', "IndexController@index");
	Route::get('index/logout', "IndexController@logout");
	Route::get('user/index', "UserController@index");
	Route::delete('user/delete/{id}', "UserController@delete");
	Route::get('user/add', "UserController@add");
	Route::post('user/save', "UserController@save");

	Route::get('news/add', "NewsController@add");
	Route::get('news/oper', "NewsController@oper");
	Route::delete('news/delete/{id}', "NewsController@delete");
	Route::match(['get', 'post'], 'news/save', "NewsController@save");
	Route::get('news/del/{id}', "NewsController@del");
	Route::get('news/update/{id}', "NewsController@update");
	Route::post('news/usave', "NewsController@usave");

	Route::get('photo/add', "PhotoController@add");
	Route::get('photo/oper', "PhotoController@oper");
	Route::delete('photo/delete/{id}', "PhotoController@delete");
	Route::match(['get', 'post'], 'photo/save', "PhotoController@save");
	Route::get('photo/del/{id}', "PhotoController@del");
	Route::get('photo/update/{id}', "PhotoController@update");
	Route::post('photo/usave', "PhotoController@usave");

	Route::get('photoimage/add/{id}', "PhotoimageController@add");
	Route::get('photoimage/oper/{id}', "PhotoimageController@oper");
	Route::delete('photoimage/delete/{id}', "PhotoimageController@delete");
	Route::post('photoimage/save', "PhotoimageController@save");
	// 后台category的路由
	Route::get('category/add', "CategoryController@add");
	Route::get('category/oper', "CategoryController@oper");
	Route::delete('category/delete/{id}', "CategoryController@delete");
	Route::match(['get', 'post'], 'category/save', "CategoryController@save");
	Route::get('category/del/{id}', "CategoryController@del");
	Route::get('category/update/{id}', "CategoryController@update");
	Route::post('category/usave', "CategoryController@usave");

	Route::get('comment/oper', "CommentController@oper");
	Route::delete('comment/delete/{id}', "CommentController@delete");

});

Route::get('text',"Admin\LoginController@index");

Route::get('admin/login/index', "Admin\LoginController@index");
Route::post('admin/login/check', "Admin\LoginController@check");

Route::get('captcha', "CaptchaController@index");

Route::group(['prefix' => 'admin', 'namespace' => 'home'], function () {

});