<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/myposts', [PostsController::class, 'myPosts'])->name('posts.myPosts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('/categories/{slug}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
