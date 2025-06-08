<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ConfigController;
use App\Http\Controllers\api\CityController;



Route::get('/configs', [ConfigController::class, 'index']);
Route::get('/cities', [CityController::class, 'index']);
