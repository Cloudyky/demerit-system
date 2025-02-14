<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ContributeController;

Route::get('/contribution', [ContributeController::class, 'index'])->name('contribution');