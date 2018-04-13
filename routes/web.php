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

//发送邮件
Route::get('/send-email','SendEmailController@send');

//实现迭代器功能
Route::get('/iterator/fibonacci','IteratorController@fibonacci');
Route::get('/iterator/scandir','IteratorController@scandir');

//堆功能
Route::get('/heap/draw','HeapController@draw');

//接口多态
Route::get('/test-contract/index','TestContractController@index');

//基础容器实现
Route::get('/test-container/index','TestContainerController@index');