<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');

// Route::get('/', function () {
//     return redirect()->route('students.index');
// }); 

// Student Routes
Route::resource('students', StudentController::class);