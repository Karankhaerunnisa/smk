<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    // ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');
Route::get('/admin/registrants', [RegistrantController::class, 'index'])->name('admin.registrants.index');
Route::get('/admin/registrants/{registrants:registration_number}', [RegistrantController::class, 'index'])->name('admin.registrants.show');

require __DIR__.'/auth.php';
