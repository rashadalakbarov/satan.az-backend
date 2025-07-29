<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MyCompanyController;
use App\Http\Controllers\admin\CityController;

Route::name('admin.')->controller(AuthController::class)->group(function () {
    Route::group(['middleware'=> 'admin.guest'], function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'authenticate')->name('index.auth');
    });

     Route::group(['middleware'=> 'admin.auth'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');

        // company settings
        Route::get('/my-company', [MyCompanyController::class, 'edit'])->name('mycompany.edit');
        Route::post('/my-company', [MyCompanyController::class, 'update'])->name('mycompany.update');
        Route::post('/my-company/contact', [MyCompanyController::class, 'contact'])->name('mycompany.contact');
        Route::post('/my-company/social', [MyCompanyController::class, 'social'])->name('mycompany.social');

        // cities
        Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        Route::get('/cities/{id}', [CityController::class, 'show'])->name('cities.show');
        Route::put('/cities/{id}', [CityController::class, 'update'])->name('cities.update');
        Route::delete('/cities/{id}', [CityController::class, 'delete'])->name('cities.delete');
    });
    
});