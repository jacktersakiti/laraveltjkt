<?php

use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('indexlanding');
});

// Route::get('/dashboard', function () {
//     return view('backend.dashboard.index');
// });

// Route::get('/shellbackdoor/timeline', function () {
//     return view('backend.dashboard.timeline');
// });

// Route::get('/shellbackdoor/lockscreen', function () {
//     return view('backend.dashboard.lockscreen');
// });

// Route::get('/dashboard', [, 'index']);
// Route::resource('/category',);

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/profile', [DashboardController::class, 'profile']);

Route::get('/shell', [LoginController::class, 'index']);
Route::get('/shell/lockscreen', [LoginController::class, 'lockscreen']);



Route::resource('/categories', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::resource('articles',ArticleController::class);
