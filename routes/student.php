<?php
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/{id}/{name}', [StudentController::class, 'show'])->name('students.show');
Route::delete('/students/{id}/remove', [StudentController::class, 'remove'])->name('students.remove');
    