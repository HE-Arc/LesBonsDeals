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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'ArticleController@getIndex')->name('index');

Route::get('/test','ArticleController@addArticle');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/article/{n}','ArticleController@show')->where('n','[0-9]+')->name('article.show');

Route::resource('article', 'Front\ContactController', ['only' => ['create', 'store']]);
