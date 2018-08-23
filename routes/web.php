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

//Route::get('/', function () {
//
//});

//Route::get('/index','IndexController@index');

Route::get('/',function (){
    return view('welcome');
});

//后台管理登录相关
Route::group(['middleware'=>['web'],'namespace'=>'Admin','prefix'=>'admin'],function(){

    //登录接口
    Route::any('login','LoginController@login');

    //验证码测试
    Route::get('code','LoginController@code');


});

//后台管理
Route::group(['middleware'=>['web','admin.login'],'namespace'=>'Admin','prefix'=>'admin'],function(){

    //欢迎页面接口
    Route::get('index','IndexController@index');

    //info页面接口
    Route::get('info','IndexController@info');

    //退出
    Route::get('quit','LoginController@Quit');

    //修改密码
    Route::any('pass','IndexController@pass');

    Route::resource('category','CategoryController');
});












