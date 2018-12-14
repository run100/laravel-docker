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

Route::get('/collect', 'CollectController@collect2')->name('collect');
Route::get('/test2', 'CollectController@test2')->name('test2');

Route::get('/scanCode', 'FuyouController@scanCode')->name('scancode');
Route::get('/order1', 'FuyouController@order1')->name('order1');
Route::get('/order2', 'FuyouController@order2')->name('order2');