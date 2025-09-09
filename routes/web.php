<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



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
});
Route::post('post/{post:slug}/comment',[CommentController::class,'store'])->name('comment_store');

// Route::get('home',[PostController::class,'index'])->name('home_page');
});



require __DIR__.'/auth.php';
