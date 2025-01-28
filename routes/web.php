<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OffenseController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\CreateOffenseController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/students', function () {
    return view('students');
})->name('students');

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    // User
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Offense
    Route::get('/offense', [OffenseController::class, 'index'])->name('offense');
    Route::delete('/offense/{offense}', [OffenseController::class, 'destroy'])->name('offense.destroy');
    Route::get('/offense/{offense}', [OffenseController::class, 'edit'])->name('offense.edit');
    Route::get('/offense/create', [OffenseController::class, 'show'])->name('show'); // problem 
    Route::put('/offense/{offense}', [OffenseController::class, 'update'])->name('offense.update');
    Route::post('/offense', [OffenseController::class, 'store'])->name('offense.store');

    // System Settings
    Route::get('/settings', [SystemSettingController::class, 'index'])->name('settings');
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
