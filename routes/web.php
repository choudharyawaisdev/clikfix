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

Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::prefix('worker')->name('worker.')->group(function () {
    Route::resource('jobworker', WorkerJobController::class);
    Route::get('/profile_details', [WorkerController::class, 'profile_details'])->name('profile_details');
    Route::get('/categoryworkerlist', [WorkerController::class, 'allWorkerCategoryJob'])->name('all_worker_list');
});














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

require __DIR__ . '/auth.php';
