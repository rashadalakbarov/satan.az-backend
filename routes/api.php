<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ConfigController;
use App\Http\Controllers\api\CityController;

// profile controller
use App\Http\Controllers\profile\AuthController;
use App\Http\Controllers\profile\ProfileController;

Route::get('/configs', [ConfigController::class, 'index']);
Route::get('/cities', [CityController::class, 'index']);

// profile
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');

    Route::middleware('auth:api')->group(function () {
        Route::get('/profile', 'profile');        
        Route::post('/logout', 'logout');

        Route::controller(ProfileController::class)->group(function () {
            Route::post('/profile/update', 'update');
        });
    });
});
