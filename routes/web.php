<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[DashboardController::class,'index']);


Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [RegisterController::class, 'register']);



Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/users/{id}/edit', [AdminController::class, 'edit']);
Route::post('/users/{id}/update', [AdminController::class, 'update']);
Route::post('/users/{id}/upload-photo', [AdminController::class, 'uploadPhoto']);
Route::delete('/users/photo/{photo_id}', [AdminController::class, 'deletePhoto']);
Route::delete('/users/{id}/delete', [AdminController::class, 'deleteUser']);

Route::post('/users/{id}/update-chartphoto', [AdminController::class, 'updateChartPhoto']);
Route::delete('/users/{id}/delete-chartphoto', [AdminController::class, 'deleteChartPhoto']);


Route::post('/users/{id}/approve', [AdminController::class, 'approve'])->name('users.approve');



Route::get('/users/{id}', [AdminController::class, 'show'])->name('users.show');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', function () {
    return view('profile_edit');
});

Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');


// Route::get('/allprofiles',[ProfileController::class, 'index'])->name('allprofiles');

Route::get('/allprofiles',[ProfileController::class, 'allProfiles'])->name('allprofiles');


// Route::get('/profiles', [ProfileController::class, 'showProfile'])->name('profile.show');


Route::get('/profile/{id}', [ProfileController::class, 'showProfile']);


Route::get('/chart', function () {
    return view('chart_edit');
});

