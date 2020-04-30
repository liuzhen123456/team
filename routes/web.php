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

    Route::get("admin",function(){
        return view("admin.index");
    });
    Route::get("/index","Admin\UserController@index");
    Route::post("/visadd","Admin\UserController@visadd");
    Route::get("/vislist","Admin\UserController@vislist");
    Route::get("/visdele/{id}","Admin\UserController@visdele");
    Route::get("/visup/{id}","Admin\UserController@visup");
    Route::post("/visupdate/{id}","Admin\UserController@visupdate");
    Route::get("/visname","Admin\UserController@visname");
    Route::get("/visgai","Admin\UserController@visgai");

Route::prefix('user')->middleware("islogin") ->group(function(){
	Route::get('index','Index\UserController@index');
	//删除
	Route::get('del/{id}','Index\UserController@destroy');
	//修改
	Route::get('update/{id}','Index\UserController@edit');
	Route::post('edit/{id}','Index\UserController@update');
});
//登录 注册
Route::prefix('/login')->group(function(){
	Route::get('index','Index\LoginController@index');
	Route::post('login_do','Index\LoginController@login_do');
	//注册
	Route::get('register','Index\LoginController@register');
	//执行注册
	Route::get('register_do','Index\LoginController@register_do');
});

