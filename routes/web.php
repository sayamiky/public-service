<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [DashboardController::class, 'profile'])
        ->name('profile');
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::post('profile/update', [DashboardController::class, 'update'])->name('profile.update');
    Route::get('services/{service}', [ServiceController::class, 'show'])
        ->middleware('validate.service.data')
        ->name('services.show');
    Route::resource('service-request', ServiceRequestController::class);
});

require __DIR__.'/auth.php';
