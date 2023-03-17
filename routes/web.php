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
    return redirect('/home');
});
//Route::get('/', function () {
  //  return view('welcome');});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/like/{post}', [App\Http\Controllers\HomeController::class, 'like'])->name('like');
Route::get('/unlike/{post}', [App\Http\Controllers\HomeController::class, 'unlike'])->name('unlike');
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::post('/post', [App\Http\Controllers\PostController::class, 'create'])->name('create');
Route::get('/mypage/{id}', [App\Http\Controllers\OtherpageController::class, 'index'])->name('mypage');
Route::get('/mypage', [App\Http\Controllers\MypageController::class, 'index'])->name('mypage');
Route::get('/follow/{user}', [App\Http\Controllers\FollowController::class, 'follow'])->name('follow');
Route::get('/unfollow/{user}', [App\Http\Controllers\FollowController::class, 'unfollow'])->name('unfollow');
Route::post('/delete/{id}/', [App\Http\Controllers\MypageController::class, 'delete'])->name('delete');
Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'login'])->name('login');
Route::get('/makeaccount', [App\Http\Controllers\MakeaccountController::class, 'index'])->name('makeaccout');
Route::get('/accountedit', [App\Http\Controllers\AccounteditController::class, 'index'])->name('accountedit');
Route::post('/accountedit', [App\Http\Controllers\AccounteditController::class, 'update'])->name('update');
Route::post('/logout', [Auth\LoginController::class, 'lloggedOut'])->name('logout');
Route::get('/login_path', [App\Http\Controllers\Login_pathController::class, 'index'])->name('login_path');
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/notification', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification');
Route::get('/reply/{id}', [App\Http\Controllers\ReplyController::class, 'index'])->name('reply');
Route::post('/reply', [App\Http\Controllers\ReplyController::class, 'create'])->name('create');
Route::post('/reply/{id}/', [App\Http\Controllers\ReplyController::class, 'delete'])->name('delete');
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
