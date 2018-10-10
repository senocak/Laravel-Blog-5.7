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


Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['uses'=>'BlogController@getIndex','as'=>'blog.index']);
Route::get('/contact','PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::get('/about','PagesController@getAbout');
Route::get('/','PagesController@getIndex'); 
Route::resource('/posts','PostController');
Route::resource('/categories','CategoryController',['except'=>'create']);
Route::resource('/tags','TagController',['except'=>'create']);

Route::post('/comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('/comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
Route::put('/comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
Route::delete('/comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
Route::get('/comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);

Route::get('/category/{slug?}',['uses'=>'CategoryController@getPost','as'=>'category.getPost']);
Route::get('/posts/{id}/delete',['uses'=>'PostController@getDelete','as'=>'posts.getDelete']);
Route::get('/categories/{id}/delete',['uses'=>'CategoryController@getDelete','as'=>'categories.getDelete']);

Auth::routes(['register'=>false]);