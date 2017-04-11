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

// profile controller

Route::get('/edit-profile', 'ProfileController@edit');

Route::match(['put', 'patch'], '/update','ProfileController@update');

// user routes

Route::resource('users','UserController');


// post routes 

Route::get('/posts/myposts', 'PostController@myposts');

Route::get('/posts/search', 'PostController@search');

Route::resource('posts','PostController');

Route::get('/download/{hashname}', 'DownloadController@download');
