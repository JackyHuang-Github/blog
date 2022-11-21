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

Route::namespace ('App\Http\Controllers')->group(function () {
    Route::get('/hello', 'SiteController@hello');
    Route::get('/users/{id?}', 'UserController@show');
    Route::get('admin', 'SiteController@dashboard');
    Route::get('album', 'SiteController@gallery');
    Route::get('album2', 'SiteController@gallery2');
});

Route::get('/posts/{post}/comments/{comment}', function ($post, $comment) {
    return "posts $post, coment $comment";
});