<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('home');
})->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/updateImage', [ProfileController::class, 'updateImage'])->name('profile.update_image');
Route::post('/profile/updateInfo', [ProfileController::class, 'updateInfo'])->name('profile.update_info');
Route::post('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.update_pass');


Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login'); //index defines method that will be loaded. This case, index function will be loaded
Route::post('/login', [LoginController::class, 'verifyLogin']);

Route::get('/register', [RegisterController::class, 'index'])->name('register'); //index defines method that will be loaded. This case, index function will be loaded
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/hotel_lists', [HotelController::class, 'index'])->name('hotels');
Route::get('/hotel_lists/{room:id}', [OrderController::class, 'OrderRoom'])->name('orderRoom');
Route::post('/hotel_lists/{room:id}', [OrderController::class, 'storeTransaction']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'postData']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');
