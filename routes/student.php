<?php
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index'])->name('students');
// Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{id}/{name}', [StudentController::class, 'show'])->name('students.show');
    