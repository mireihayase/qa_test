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


Route::get('/', 'ArticleController@index');

Route::get('/articles', 'ArticleController@index');
Route::get('/articles/{id}', 'ArticleController@show');

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::get('/tags', 'TagController@index');
Route::get('/tags/{id}', 'TagController@show');

//Route::get('/terms/use', 'IndexController@terms');
//Route::get('/terms/privacy', 'IndexController@privacy');
