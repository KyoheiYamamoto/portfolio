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
    Route::get('portfolio', 'Admin\portfolioController@index')->middleware('auth'); 
});
    Route::get('portfolio/edit', 'Admin\portfolioController@edit')->middleware('auth'); 
    Route::post('portfolio/edit', 'Admin\portfolioController@update')->middleware('auth'); 
    Route::get('portfolio/delete', 'Admin\portfolioController@delete')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
