<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

// Route::get('/posts/{post}/comments/{comment}', function ($post, $comment) {
//     return "posts $post, coment $comment";
// });

Route::namespace('App\Http\Controllers\test')->group(function () {
    Route::get('/hello', 'TestController@hello');
    Route::get('/users/{id?}', 'TestController@show');
    Route::get('/paras/{type}}', 'TestController@paraSend');
    // Route::get('/demo', 'TestController@demo');
    Route::get('/demo', 'TestController@demo');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/admin', 'SiteController@dashboard');
    Route::get('/album', 'SiteController@gallery');
    Route::get('/album2', 'SiteController@gallery2');
});

Route::get('paint', function() {
	return view('paint');
})->name('mypaint');

Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/api/items', 'App\Http\Controllers\api\ItemController');

Route::get('/url', function() {
	//return url('paint');
	//return route('mypaint');
	return action([SiteController::class, 'demo']);
});