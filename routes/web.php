<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\VipController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PublicController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SearchController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\InformationController;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/contact-us', [ContactController::class,'index'])->name('contact');
Route::post('/contact-us/send', [ContactController::class,'store'])->name('send');

Route::get('/public', [PublicController::class,'index'])->name('public');

Route::get('/vip', [VipController::class,'index'])->name('vip');

Route::get('/search', [SearchController::class,'index'])->name('search');

//Route::get('/', [CommentController::class,'index'])->name('comment');

//Route::get('/', [LikeController::class,'index'])->name('like');




Route::prefix('auth')->group(function(){

    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/do-login',[LoginController::class,'login'])->name('do-login');
    Route::get('/register',[RegisterController::class,'index'])->name('register');
    Route::post('/do-register',[RegisterController::class,'register'])->name('do-register');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');



});



Route::prefix('dashboard')->middleware('authchek')->group(function(){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    //information panel
    Route::get('/information',[InformationController::class,'index'])->name('info');
    Route::post('/update-info/{id}',[InformationController::class,'update'])->name('info-update');
    //users panel
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/users/show/{id}',[UserController::class,'show'])->name('user-show');
    Route::get('/users/delete/{id}',[UserController::class,'destroy'])->name('user-delete');
    //message panel
    Route::get('/messages',[MessageController::class,'index'])->name('messages');
    Route::get('/messages/show/{id}',[MessageController::class,'show'])->name('show-message');
    Route::get('/messages/delete/{id}',[MessageController::class,'destroy'])->name('delete-message');
    //post panel
    Route::get('/post',[PostController::class,'index'])->name('posts');
    Route::get('/post/create',[PostController::class,'create'])->name('create-post');
    Route::post('/post/store',[PostController::class,'store'])->name('store-post');
    Route::get('/post/show/{id}',[PostController::class,'show'])->name('show-post');
    Route::post('/post/update/{id}',[PostController::class,'update'])->name('update-post');
    Route::get('/post/delete/{id}',[PostController::class,'destroy'])->name('delete-post');
    //categories panel
    Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('store-categories');
    Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('update-categories');
    Route::get('/categories/delete/{id}',[CategoryController::class,'destroy'])->name('delete-categories');
    //search panel
    Route::get('/search',[SearchController::class,'index'])->name('search');
    //slider panel
    Route::get('/slider',[SliderController::class,'index'])->name('slider');
    Route::post('/slider/store',[SliderController::class,'store'])->name('slider-create');
    Route::post('/slider/update/{id}',[SliderController::class,'update'])->name('slider-update');
    Route::get('/slider/delete/{id}',[SliderController::class,'destroy'])->name('slider-delete');
    //Route::post('/dologin',[UserController::class,'DoLogin'])->name('auth.login');
    //Route::get('/register',[UserController::class,'register'])->name('register');
    //Route::post('/doregister',[UserController::class,'DoRegister'])->name('auth.create');
    //Route::get('/logout',[UserController::class,'logout'])->name('logout');

});