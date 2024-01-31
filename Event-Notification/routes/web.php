<?php

use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post',[PostController::class,'index'])->name('post');
Route::get('/detail/{id}',[PostController::class,'detail'])->name('post.detail');
Route::get('/notification',[NotificationController::class,'index'])->name('notification');
Route::get('/check/{id}',[NotificationController::class,'check'])->name('notification.check');
Route::post('/store',[PostController::class,'store'])->name('post.store');
