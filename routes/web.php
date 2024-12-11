<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\TipController;

Route::get('/', function () {
    return view('auth.signup');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/about', [AuthController::class, 'about'])->name('about')->middleware('auth');
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

Route::middleware(['auth'])->group(function() {
    Route::get('/journal', [JournalController::class, 'index'])->name('journals.index');
    Route::get('/journal/create', [JournalController::class, 'create'])->name('journals.create');
    Route::post('/journal', [JournalController::class, 'store'])->name('journals.store');
    Route::get('/journal/{journal}', [JournalController::class, 'show'])->name('journals.show');
    Route::get('/journal/{journal}/edit', [JournalController::class, 'edit'])->name('journals.edit');
    Route::put('/journal/{journal}', [JournalController::class, 'update'])->name('journals.update');
    Route::delete('/journal/{journal}', [JournalController::class, 'destroy'])->name('journals.destroy');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
    Route::get('/community/create', [CommunityController::class, 'create'])->name('community.create');
    Route::post('/community', [CommunityController::class, 'store'])->name('community.store');
    Route::get('/community/{question}', [CommunityController::class, 'show'])->name('community.show');
    Route::post('/community/{question}/answer', [CommunityController::class, 'answer'])->name('community.answer');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/tip', [TipController::class, 'index'])->name('tips.index');
    Route::get('/tip/create', [TipController::class, 'create'])->name('tips.create');
    Route::post('/tip', [TipController::class, 'store'])->name('tips.store');
});
