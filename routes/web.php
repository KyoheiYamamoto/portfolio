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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('portfolio/create', 'Admin\portfolioController@add')->middleware('auth');
    Route::post('portfolio/create', 'Admin\portfolioController@create');
    Route::get('news', 'Admin\portfolioController@index')->middleware('auth'); // 追記
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
