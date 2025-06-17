<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisteredAdminController;
use App\Http\Controllers\SessionController;

// Route::get('/', function () {
//     return view('dashboard.index');
// })->name('dashboard');

// // Student Routes
// Route::resource('students', StudentController::class);

// //auth
// Route::get('/register', [RegisteredAdminController::class, 'create']);
// Route::post('/register', [RegisteredAdminController::class, 'store']);


//guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
});


// auth
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('students', StudentController::class);

    Route::get('/register', [RegisteredAdminController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredAdminController::class, 'store']);
    Route::post('/logout', [SessionController::class, 'destroy']);

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
    
    Route::get('/test', function () {
        return view('mail.student-posted');
    })->name('mail');
    
});

// 404 Route
Route::fallback(function () {
    return view('404');
});