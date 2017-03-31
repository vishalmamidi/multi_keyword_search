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
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index');



/*
Route::get('/upload', 'PostsController@upload');
Route::post('/store', 'PostsController@store');
Route::get('/search', 'PostsController@search');
Route::get('/myfiles', 'PostsController@myfiles');
*/

Route::resource('users','UserController');

Route::get('/posts/myposts', 'PostController@myposts');
Route::get('/posts/search', 'PostController@search');
Route::resource('posts','PostController');

Route::get('/download/{hashname}', 'DownloadController@download');
