<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MyCompanyController;

Route::name('admin.')->controller(AuthController::class)->group(function () {
    Route::group(['middleware'=> 'admin.guest'], function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'authenticate')->name('index.auth');
    });

     Route::group(['middleware'=> 'admin.auth'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/my-company', [MyCompanyController::class, 'edit'])->name('mycompany.edit');
        Route::post('/my-company', [MyCompanyController::class, 'update'])->name('mycompany.update');
    });
    
});