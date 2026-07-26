<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AircraftController;
use App\Http\Controllers\GroundStaffController;
use App\Http\Controllers\GroundHandlingServiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Airlines
    Route::resource('airlines', AirlineController::class);

    // Aircraft
    Route::resource('aircraft', AircraftController::class);

    // Ground Staff
    Route::resource('ground-staff', GroundStaffController::class);

    // Ground Handling Services
    Route::resource('ground-handling-services', GroundHandlingServiceController::class);
});

require __DIR__.'/auth.php';