<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OffenseController;
use App\Http\Controllers\ContributeController;
use App\Http\Controllers\ActiveUserController;

Route::get('/', [ActiveUserController::class, 'index'])->name('welcome'); 
Route::get('/user/stats', [ActiveUserController::class, 'getUserStats'])->name('user.stats');

Route::get('/offense/add', [OffenseController::class, 'show'])->name('offense.add'); 
Route::get('/contribution/add', [ContributeController::class, 'show'])->name('contribution.add'); 

Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    // System Settings
    Route::get('/settings', [SystemSettingController::class, 'index'])->name('settings');
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/offense.php';
require __DIR__.'/student.php';
require __DIR__.'/setting.php';
require __DIR__.'/contribute.php';
