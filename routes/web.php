<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\followController;
use App\Http\Controllers\likecontroller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/user/{user:username}',[UserController::class,'index'])->name('user_profile');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::controller(PostController::class)->group(function(){
    Route::get('post/create','create')->name('create_post');
    Route::post('post/create','store')->name('store_post');
    Route::get('post/{post:slug}','show')->name('show_post');
    Route::get('post/{post:slug}/edit','edit')->name('edit_post');
    Route::put('post/edit/{post:slug}','update')->name('update_post');
    Route::delete('post/{post:slug}','destroy')->name('destroy_post');
    Route::get('/','index')->name('home_page');
    Route::get('/explore','explore')->name('explore');
});
Route::post('post/{post:slug}/comment',[CommentController::class,'store'])->name('comment_store');
Route::get('post/{post:slug}/like',likecontroller::class)->name('post_like');
Route::get('follow/{user:username}',[followController::class,'follow'])->name('follow');
Route::get('unfollow/{user:username}',[followController::class,'unfollow'])->name('unfollow');

// Route::get('home',[PostController::class,'index'])->name('home_page');
});





require __DIR__.'/auth.php';
