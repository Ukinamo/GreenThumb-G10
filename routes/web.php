<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.signup');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');