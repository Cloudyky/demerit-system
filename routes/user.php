<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{id}/{name}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}/remove', [UserController::class, 'remove'])->name('users.remove');
});