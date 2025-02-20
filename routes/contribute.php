<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ContributeController;

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/contribution', [ContributeController::class, 'index'])->name('contribution');
    Route::delete('/contribution/{contribution}', [ContributeController::class, 'destroy'])->name('contribution.destroy');
    Route::get('/contribution/{contribution}', [ContributeController::class, 'edit'])->name('contribution.edit');
    Route::put('/contribution/{contribution}', [ContributeController::class, 'update'])->name('contribution.update');
    Route::post('/contribution', [ContributeController::class, 'store'])->name('contribution.store');
});