<?php

use Illuminate\Support\Facades\Route;

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

//登录注册
Route::prefix('admin')->group(function () {
	Route::any('login','Admin\UserController@login');
	Route::post('login_do','Admin\UserController@login_do');
	
});

Route::prefix('user')->middleware('User')->group(function () {
	Route::get('mycenter','Admin\UserController@mycenter');
});

Route::prefix('pass')->group(function () {
    Route::get('/','Admin\FindPass@findpass');  //展示找回页面
    Route::post('/doFindpass','Admin\FindPass@doFindpass'); //执行发邮件
});


Route::prefix('register')->group(function(){
    Route::get('/','Admin\UserController@register');
    Route::post('/store','Admin\UserController@store');
});

