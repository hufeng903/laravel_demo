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

Route::get('/send-email','SendEmailController@send');
Route::get('/iterator/fibonacci','IteratorController@fibonacci');
Route::get('/iterator/scandir','IteratorController@scandir');
Route::get('/heap/draw','HeapController@draw');
