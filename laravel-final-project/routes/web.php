<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('posts.index');
});

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (NO LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

// View posts (index + show only)
Route::resource('posts', PostController::class)->only(['index', 'show', 'create']);

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    | Dashboard
    */
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    | Profile
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    | POSTS (ALL AUTH ACTIONS)
    | create, store, edit, update, destroy
    */
    Route::resource('posts', PostController::class)->except(['index', 'show']);

    /*
    | CATEGORIES (FULL CRUD)
    */
    Route::resource('categories', CategoryController::class);

    /*
    | COMMENTS
    */
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->name('comments.store');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (BREEZE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';