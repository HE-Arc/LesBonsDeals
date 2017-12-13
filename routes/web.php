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

Route::get('/', 'ArticleController@getIndex')->name('index');

Auth::routes();

//User home
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/articles', 'HomeController@manageArticles')->name('manage_articles');

Route::get('/home/settings', 'HomeController@settings')->name('settings');

//get /articles avec paramètres

//Route::get('/article/{n}','ArticleController@show')->where('n','[0-9]+')->name('article.show');
Route::get('/search', 'ArticleController@find')->name('article_find');

Route::resource('article', 'ArticleController', ['only' => ['show', 'create', 'store', 'edit', 'destroy', 'update']]);

Route::post('/user/udpdate','HomeController@updateUserInfo');