<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
});