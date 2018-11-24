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

Route::get('/world', ['uses' => '\App\Http\Controllers\Controller@world']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/talks', 'HomeController@talks')->name('talks');
Route::post('/posttalks', 'HomeController@postTalks')->name('posttalks');

Route::get('/collect', 'CollectController@collect')->name('collect');