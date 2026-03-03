<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\WorkerJobController;



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', ServiceController::class);
});

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::prefix('worker')->name('worker.')->group(function () {
    Route::get('/services/{category}', [WorkerController::class, 'workerservices'])->name('workerservices');
    Route::resource('jobworker', WorkerJobController::class);
    Route::get('/profile_details/{id}', [WorkerController::class, 'profile_details'])->name('profile_details');
    Route::get('/profile/update', [WorkerController::class, 'edit_profile'])->name('profile.edit');
    Route::post('/profile/update', [WorkerController::class, 'update_profile'])->name('profile.update');
});
















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
