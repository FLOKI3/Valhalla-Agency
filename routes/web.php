<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

Route::get('/index', function () {
    return view('welcome');
});
Route::get('/signup', function () {
    return view('user.signup');
})->name('signup');


Route::get('/', [HomePageController::class, 'index'])->name('user.home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
