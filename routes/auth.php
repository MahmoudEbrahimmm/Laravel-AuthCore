<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\FacebookAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GithubAuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocailAuthController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\Auth\VerifyAccountController;
use Illuminate\Support\Facades\Route;


// LOGIN ROUTES
Route::view('/login', 'auth.login')->name('login');
Route::post('login', LoginController::class);

// REGISTER ROUTES
Route::view('/register', 'auth.register')->name('register');
Route::post('register', RegisterController::class);

// SOCIAL AUTH ROUTES
Route::get("/auth/{driver}/redirect", [SocailAuthController::class, 'redirect']);
Route::get("/auth/{driver}/callback", [SocailAuthController::class, 'callback']);

// FORGOT PASSWORD ROUTES
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::post("/forgot-password", ForgotPasswordController::class)->name('password.email');

// RESET PASSWORD ROUTES
Route::view('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
Route::post("/reset-password", ResetPasswordController::class)->name('password.update');

// VERIFY EMAIL ROUTES
Route::view("/verify-email/{email}", 'auth.verify-email')->name('email.verify');
Route::post("/verify-email", VerifyAccountController::class);

Route::middleware('auth')->group(function(){
 // PROFILE ROUTES
 Route::view('/profile', 'auth.profile');
 Route::put('profile', UpdateProfileController::class);
 Route::post('change-password', ChangePasswordController::class);
 
 // LOGOUT ROUTES
 Route::post('logout', LogoutController::class)->name('logout');

});