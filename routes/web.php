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

Route::any('login','UserController@login');
Route::post('login_do','UserController@login_do');
	

Route::prefix('user')->middleware('User')->group(function () {
	Route::get('mycenter','UserController@mycenter');
});

Route::prefix('pass')->group(function () {
    Route::get('/','FindPass@findpass');  //展示找回页面
    Route::post('/doFindpass','FindPass@doFindpass'); //执行发邮件
    Route::get('/newpass','FindPass@resPass');  //展示重置密码页面
    Route::post('/newpass','FindPass@doResPass');  //执行重置密码
});



Route::prefix('register')->group(function(){
    Route::get('/','UserController@register');
    Route::post('/store','UserController@store');
});

