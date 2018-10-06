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

//Route::get('/', function () {return view('welcome');});


Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['uses'=>'BlogController@getIndex','as'=>'blog.index']);
Route::get('/contact','PagesController@getContact');
Route::get('/about','PagesController@getAbout');
Route::get('/','PagesController@getIndex'); 
Route::resource('/posts','PostController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');