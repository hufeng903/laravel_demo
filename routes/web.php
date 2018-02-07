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

Route::get('/test','TestController@index');
Route::get('/insert-three-null','HandleDataController@insertThreeNull');
Route::get('/delete-start-char','HandleDataController@deleteStartChar');
Route::get('/insert-physical','HandleDataController@insertPhysical');
Route::get('/insert-lab-exam','HandleDataController@insertLabExam');
Route::get('/insert-diagnosis','HandleDataController@insertDiagnosis');
