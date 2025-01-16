<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffenseController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/students', function () {
    return view('students');
})->name('students');

Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth', 'verified', AdminMiddleware::class])
    ->name('users');
    
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::delete('/offense/{offense}', [OffenseController::class, 'destroy'])->name('offense.destroy');

Route::get('/offense', [OffenseController::class, 'index'])
    ->middleware(['auth', 'verified', AdminMiddleware::class])
    ->name('offense');

Route::get('/system-settings', function () {
        return view('settings');
    })
    ->middleware(['auth', 'verified', AdminMiddleware::class])
    ->name('settings');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});

require __DIR__.'/auth.php';
