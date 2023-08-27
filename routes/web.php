<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
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

Route::middleware('auth-user')->group(function () {
    Route::get('/', [BlogController::class,'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class,'show']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
});



Route::middleware('guest')->group(function () {
    Route::get('/register',[AuthController::class,'create']);
    Route::post('/register',[AuthController::class,'store']);
    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'loginStore']);
});




Route::get('/contact-us', function () {
    return view('contact.index');
});

Route::get('/about', function () {
    return view('about');
});