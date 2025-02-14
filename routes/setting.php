<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\SystemSettingController;

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/settings', [SystemSettingController::class, 'index'])->name('settings');
});