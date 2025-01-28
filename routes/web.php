<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


// Email verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Verify email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return view('welcome');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend email for verification
Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware('auth')->name('verification.send');


//Admin & Customer Register
Route::get('/register/customer', [CustomRegisterController::class, 'showCustomerRegistrationForm'])->name('register.customer');
Route::post('/register/customer', [CustomRegisterController::class, 'registerCustomer']);
Route::get('/register/admin', [CustomRegisterController::class, 'showAdminRegistrationForm'])->name('register.admin');
Route::post('/register/admin', [CustomRegisterController::class, 'registerAdmin']);

//Admin Login
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'adminLogin']);

Route::get('/dashboard', function () {
    return 'Welcome to your dashboard!';
})->middleware(['auth', 'verified'])->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
