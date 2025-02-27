<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\OffenseController;

Route::get('/offense', [OffenseController::class, 'index'])->name('offense');
Route::delete('/offense/{offense}', [OffenseController::class, 'destroy'])->name('offense.destroy');
Route::get('/offense/{offense}', [OffenseController::class, 'edit'])->name('offense.edit');
Route::put('/offense/{offense}', [OffenseController::class, 'update'])->name('offense.update');
Route::post('/offense', [OffenseController::class, 'store'])->name('offense.store');