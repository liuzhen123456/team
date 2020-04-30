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

Route::get('/','Admin\AdminController@index');
//客户管理
Route::get('/custom/create','Admin\CustomController@create');//添加页面
Route::post('/custom/store','Admin\CustomController@store');//执行添加页面
Route::get('/custom','Admin\CustomController@index');//列表页面
Route::get('/custom/destroy/{id}','Admin\CustomController@destroy');//删除页面
Route::get('/custom/edit/{id}','Admin\CustomController@edit');//编辑页面
Route::post('/custom/update/{id}','Admin\CustomController@update');//执行编辑页面
