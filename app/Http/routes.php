<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 相应微信请求
Route::any('/wechat', 'WechatController@serve');

// 网页入口
Route::any('/redirect', 'IndexController@redirect');
Route::get('/profile', 'IndexController@profile');

// 用户认证注册入口
Route::get('register', 'RegisterController@index');

// 统一身份认证
Route::post('/auth', 'AuthController@auth');
// - 北京师范大学
Route::any('/auth/bnu', 'AuthController@bnu');

// 用户
Route::resource('users', 'UsersController');

// 借车
Route::controller('rent', 'RentController');
Route::controller('return', 'ReturnController');
Route::get('/hi', function(){
	return view('rent.success')->withPassword('123456');
});
