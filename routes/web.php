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


// all auth related routs
Auth::routes();
//
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index');



Route::resource('users','UserController');

Route::get('/posts/myposts', 'PostController@myposts');

Route::get('/posts/search', 'PostController@search');

// showing serach result
//Route::get('/posts/search/{query}', 'PostController@searching');

Route::resource('posts','PostController');

Route::get('/download/{hashname}', 'DownloadController@download');
