<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\subscribeController;
use App\Mail\WelcomeEmail;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;
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
Route::get('/', [BlogController::class,'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class,'show'])->name('blog.show');
Route::middleware('auth-user')->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);
    Route::post('/blogs/{blog:slug}/subscribe',[subscribeController::class,'subscribe'])->name('blogs.toggle');
    Route::delete('/blogs/comments/{comment:id}/delete',[CommentController::class,'delete']);
    Route::get('/blogs/comments/{comment:id}/edit',[CommentController::class,'edit']);
    Route::put('/blogs/comments/{comment:id}/edit',[CommentController::class,'update']);
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