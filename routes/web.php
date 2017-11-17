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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//get /articles avec paramètres

//Route::get('/article/{n}','ArticleController@show')->where('n','[0-9]+')->name('article.show');
Route::get('/search/{name}','ArticleController@find')->name('article.find');

Route::resource('article', 'ArticleController', ['only' => ['show','create', 'store', 'edit','destroy']]);



