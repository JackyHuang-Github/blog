<?php

use Illuminate\Support\Facades\Route;

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

<<<<<<< HEAD
Route::get('/hello', 'App\Http\Controllers\SiteController@hello');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@show');
Route::get('/posts/{post}/comments/{comment}', function ($post, $comment) {
    return "posts $post, coment $comment";
});

// Route::get('admin','SiteController@dashboard');
Route::get('admin', 'App\Http\Controllers\SiteController@dashboard');

// Route::get('album', 'SiteController@gallery');
Route::get('album', 'App\Http\Controllers\SiteController@gallery');

// Route::get('album2', 'SiteController@gallery2');
Route::get('album2', 'App\Http\Controllers\SiteController@gallery2');

Route::get('demo', 'App\Http\Controllers\PostController@demo');

Route::resource('posts', 'App\Http\Controllers\PostController');
Route::apiResource('posts', 'App\Http\Controllers\Api\PostController');

// php artisan make:controller Api/PostController --api
=======
Route::get('/posts/{post}/comments/{comment}', function($post,$comment){
    return "posts $post , comments $comment";
  });
  
Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/hello', 'SiteController@hello');
    Route::get('/users/{id?}', 'UserController@show');
    Route::get('admin','SiteController@dashboard');
    Route::get('album', 'SiteController@gallery');
    Route::get('album2', 'SiteController@gallery2');
});

Route::get('/posts/{post}/comments/{comment}', function($post, $comment){
    return "posts $post, coment $comment";
});


>>>>>>> bdd2e7eb82d211fc95a0d5ccb3edd3cc9b1d94f2
