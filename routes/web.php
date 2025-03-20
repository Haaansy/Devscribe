<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/register', [AuthController::class, 'showRegister']) -> name('show.register');
Route::post('/register', [AuthController::class, 'register']) -> name('register');
Route::get('/login', [AuthController::class, 'showLogin']) -> name('show.login');
Route::post('/login', [AuthController::class, 'login']) -> name('login');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']) -> name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']) -> name('logout');
    Route::get('/dashboard/blog/create', [DashboardController::class, 'createBlog']) -> name('show.createBlog');
    Route::get('/dashboard/blog/{id}', [DashboardController::class, 'updateBlog']) -> name('show.editBlog');

    Route::post('/blog/create', [BlogController::class, 'create']) -> name('create.blog');
    Route::get('/blog/{id}', [BlogController::class, 'show']) -> name('show.blog');
    Route::put('/blog/{id}', [BlogController::class, 'update']) -> name('update.blog');
    Route::delete('/blog/{id}', [BlogController::class, 'delete']) -> name('delete.blog');
});