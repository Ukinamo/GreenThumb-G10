<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;

Route::get('/', function () {
    return view('auth.signup');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/plant', [PlantController::class, 'index'])->name('plants.index');
    Route::get('/plant/create', [PlantController::class, 'create'])->name('plants.create');
    Route::post('/plant', [PlantController::class, 'store'])->name('plants.store');
    Route::get('/plant/{plant}', [PlantController::class, 'show'])->name('plants.show');
    Route::get('/plant/{plant}/edit', [PlantController::class, 'edit'])->name('plants.edit');
    Route::put('/plant/{plant}', [PlantController::class, 'update'])->name('plants.update');
    Route::delete('/plant/{plant}', [PlantController::class, 'destroy'])->name('plants.destroy');
});

