<?php
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index'])->name('students');