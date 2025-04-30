<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GarbageController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckLogin;

Route::get('/', function () {
    return view('about');
    // return session('user')->email;
    // return redirect()->route('login');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/signup', function() {
    return view('user.create');
})->name('signup');



// Route::middleware(['CheckLogin'])->group(function () {
Route::resource('admin', AdminController::class);
Route::resource('user', UserController::class);
Route::resource('garbage', GarbageController::class);
Route::resource('staff', StaffController::class);


Route::post('/assign-sector/{id}', [AdminController::class, 'assignSector'])->name('assign.sector');
Route::post('/staff/create', [AdminController::class, 'createStaff'])->name('staff.create');

Route::get('/profile', [UserController::class, 'edit'])->name('profile');

Route::put('profile/update/{id}', [UserController::class, 'update'])->name('profile.update');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
// });