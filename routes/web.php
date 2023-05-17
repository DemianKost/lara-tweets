<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\BookmarkController;

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

// Guest routes
Route::middleware('guest')->group( function() {
    // Login routes
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);

    // Register routes
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});

// Auth routes
Route::middleware('auth')->group( function() {
    // Home routes
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/explore', [HomeController::class, 'explore']);

    // Profile routes
    Route::get('/profile/followers', [ProfileController::class, 'followers']);
    Route::get('/profile/following', [ProfileController::class, 'following']);
    Route::post('/profile/me/update', [ProfileController::class, 'updateProfile']);
    Route::resource('/profile', ProfileController::class);
    
    // Tweets routes
    Route::resource('/tweet', TweetController::class);
    Route::post('/tweet/{tweet}', [TweetController::class, 'like']);
    Route::post('/tweet/{tweet}/respond', [TweetController::class, 'respond']);

    // Follower routes
    Route::post('/follow/{profile}', [FollowerController::class, 'follow']);

    // Bookmark routes
    Route::post('/bookmark/{tweet}', [BookmarkController::class, 'bookmark']);
    Route::resource('/bookmark', BookmarkController::class);
});