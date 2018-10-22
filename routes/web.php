<?php

Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'Admin\BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['uses'=>'Admin\BlogController@getIndex','as'=>'blog.index']);
Route::get('/contact','PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::get('/about','PagesController@getAbout');
Route::get('/','PagesController@getIndex'); 
Route::resource('/posts','Admin\PostController');
Route::resource('/categories','Admin\CategoryController',['except'=>'create']);
Route::resource('/tags','Admin\TagController',['except'=>'create']);

Route::get('/comments',['uses'=>'Admin\CommentsController@index','as'=>'comments.index']);
Route::get('/comments/{id}',['uses'=>'Admin\CommentsController@show','as'=>'comments.show']);
Route::post('/comments/{post_id}',['uses'=>'Admin\CommentsController@store','as'=>'comments.store']);
Route::get('/comments/{id}/edit',['uses'=>'Admin\CommentsController@edit','as'=>'comments.edit']);
Route::put('/comments/{id}',['uses'=>'Admin\CommentsController@update','as'=>'comments.update']);
Route::delete('/comments/{id}',['uses'=>'Admin\CommentsController@destroy','as'=>'comments.destroy']);
Route::get('/comments/{id}/delete',['uses'=>'Admin\CommentsController@delete','as'=>'comments.delete']);
Route::get('/comments/{id}/approved',['uses'=>'Admin\CommentsController@approved','as'=>'comments.approved']);

Route::get('/category/{slug?}',['uses'=>'Admin\CategoryController@getPost','as'=>'category.getPost']);
Route::get('/posts/{id}/delete',['uses'=>'Admin\PostController@getDelete','as'=>'posts.getDelete']);
Route::get('/posts/{id}/fixed',['uses'=>'Admin\PostController@fixed','as'=>'posts.fixed']);
Route::get('/categories/{id}/delete',['uses'=>'Admin\CategoryController@getDelete','as'=>'categories.getDelete']);

Auth::routes(['register'=>false]);

Route::post('postSirala', ['uses'=>'Admin\PostController@sortPosts','as'=>'posts.sortPosts']);
Route::post('categorySirala', ['uses'=>'Admin\CategoryController@sortPosts','as'=>'categories.sortPosts']);
Route::get('profile', ['uses'=>'PagesController@getProfile','as'=>'login.index']);
Route::post('profile', ['uses'=>'PagesController@saveProfile','as'=>'login.save']);


Route::get('settings', 'Admin\AyarController@index');
Route::post('settings', 'Admin\AyarController@update');


Route::get('/android/{id?}', ['uses'=>'Admin\BlogController@Android','as'=>'blog.android']);