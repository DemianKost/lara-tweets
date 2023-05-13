<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowerController;

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

    // Profile routes
    Route::resource('/profile', ProfileController::class);
    Route::post('/profile/me/update', [ProfileController::class, 'updateProfile']);
    
    // Tweets routes
    Route::resource('/tweet', TweetController::class);
    Route::post('/tweet/{tweet}', [TweetController::class, 'like']);

    // Follower routes
    Route::post('/follow/{profile}', [FollowerController::class, 'follow']);
});