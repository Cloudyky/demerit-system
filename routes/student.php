<?php

Route::get('/students', function () {
    return view('students');
})->name('students');