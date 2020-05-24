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
Route::resource('/news','NewsController');


Auth::routes();

Route::get('/', 'NewsController@index')->name('main');
Route::get('/home', 'NewsController@index')->name('home');
Route::get('/bytags/{tag}', 'IndexController@byTags')->name('byTags');



