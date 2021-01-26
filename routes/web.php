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

Route::get('/', function () {
    return view('welcome');
});

//用户模块
//注册页面
Route::get('/register', "\App\Http\Controllers\RegisterController@index");
Route::post('/register', "\App\Http\Controllers\RegisterController@register");
#登录页面
Route::get('/login', "\App\Http\Controllers\LoginController@index")->name('login');
#登录行为
Route::post('/login', "\App\Http\Controllers\LoginController@login");
#登出
Route::get('/logout', "\App\Http\Controllers\LoginController@logout");
#个人设置页面
Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');



//文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');
#创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
#文章详情页
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
#编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
#删除文章
Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');
//图片上传
Route::post('/posts/img/upload', '\App\Http\Controllers\PostController@imageUpload');

//提交评论
Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');

Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');
