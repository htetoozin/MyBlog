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

//Fronted View or Router 
Route::get('/', 'PagesController@getIndex');

Route::get('about', 'PagesController@getAbout');

//Contact Router
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

//Blog Router
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

//Category Router
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Comment Router
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as'=> 'comments.store']);

//Tag Router
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::resource('posts', 'PostController');
Auth::routes();

Route::get('/home', 'HomeController@index');
