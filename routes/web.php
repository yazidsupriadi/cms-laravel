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

Auth::routes();
Route::get('/welcome','BerandaController@welcome');
Route::get('/welcome/{id}/post','BerandaController@post');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts','PostController@index');
Route::get('/posts/create','PostController@create');
Route::post('posts/store','PostController@store');
Route::delete('posts/{id}','PostController@destroy');
Route::get('/posts/trashed','PostController@trashed');
Route::get('/posts/{id}/edit','PostController@edit');
Route::post('/posts/{id}/update','PostController@update');
Route::put('/posts/{id}','PostController@restore');


Route::middleware(['auth','admin'])->group(function(){
	Route::get('/users','UserController@index');
	Route::post('/users/{id}/makeadmin','UserController@makeadmin');
	Route::get('/categories','CategoryController@index');
	Route::get('/categories/add','CategoryController@add');
	Route::post('/categories/store','CategoryController@store');
	Route::get('/categories/{id}/delete','CategoryController@delete');
	Route::get('/categories/{id}/edit','CategoryController@edit');
	Route::post('/categories/{id}/update','CategoryController@update');

});