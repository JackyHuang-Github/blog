<?php

use App\Models\Cgy;
use App\Models\Article;
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
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/admin', 'SiteController@dashboard');
    Route::get('/album', 'SiteController@gallery');
    Route::get('/album2', 'SiteController@gallery2');
    Route::get('/demo', 'SiteController@demo');
});

Route::get('paint', function() {
	return view('paint');
})->name('mypaint');

Route::resource('/articles', 'App\Http\Controllers\ArticleController');
Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/api/items', 'App\Http\Controllers\api\ItemController');
Route::resource('/cgies', 'App\Http\Controllers\CgyController');


Route::get('/url', function() {
	//return url('paint');
	//return route('mypaint');
	return action([SiteController::class, 'demo']);
});

// 老師提供：可直接取得 storage 的路徑
Route::get('storagepath',function(){
    return storage_path();
});

// 取得預設資料庫
Route::get('/config', function() {
    dd(config('database.default'));
});

Route::get('newcgy', function() {
    // 方法一
    $cgy = new Cgy;
    $cgy->title = '我的英雄學院：方法一';
    $cgy->desc = '我的英雄學院劇場版：方法一';
    $cgy->enabled = true;
    $cgy->save();

    // 方法二
    // $cgy = new Cgy([
    //     'title' => '我的英雄學院：方法二',
    //     'desc' => '我的英雄學院劇場版：方法二',
    //     'enabled' => true
    // ]);
    // $cgy->save();
});

Route::get('/distinct', function() {
    $data = Article::select('cgy_id')->distinct('cgy_id')->get();
    // $data = Article::select(['id', 'subject', 'cgy_id'])->distinct('cgy_id')->get();
    // $data = Cgy::select(['id', 'subject', 'remark'])->distinct('remark')->where('remark', !ISNULL())->get();
    return $data;
});

Route::get('/pluck', function() {
    // $data = Cgy::select(['id', 'subject'])->get();
    $data = Cgy::pluck('subject','id');
    // 注意：pluck 不可使用 [] 陣列，而是直接指定欄位即可
    // $data = Cgy::pluck(['subject','id']);
    return $data;
});

Route::get('/changecgy', function() {
    $cgy = Cgy::find(1);
    $cgy->subject = '新分類';
    $cgy->save();
});

Route::get('/delcgy/{cgy}', function() {
    $cgy = Cgy::find(1);
    $cgy->subject = '新分類';
    $cgy->save();
});