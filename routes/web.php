<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MyCompanyController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ElanlarController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OptionController;
use App\Http\Controllers\admin\OptionValueController;

Route::name('admin.')->controller(AuthController::class)->group(function () {
    Route::group(['middleware'=> 'admin.guest'], function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'authenticate')->name('index.auth');
    });

     Route::group(['middleware'=> 'admin.auth'], function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');

        // company settings
        Route::name('mycompany.')->controller(MyCompanyController::class)->group(function (){
            Route::get('/my-company', 'edit')->name('edit');
            Route::post('/my-company', 'update')->name('update');
            Route::post('/my-company/contact', 'contact')->name('contact');
            Route::post('/my-company/social', 'social')->name('social');
        });
        

        // cities
        Route::name('cities.')->controller(CityController::class)->group(function (){
            Route::get('/cities', 'index')->name('index');
            Route::post('/cities', 'store')->name('store');
            Route::get('/cities/{id}', 'show')->name('show');
            Route::put('/cities/{id}', 'update')->name('update');
            Route::delete('/cities/{id}', 'delete')->name('delete');
        });

        // elanlar
        Route::name('elanlar.')->controller(ElanlarController::class)->group(function (){
            Route::get('/elanlar', 'index')->name('index');
            Route::get('/elanlar/{id}', 'show')->name('show');
            Route::post('/elanlar/{id}', 'update')->name('update');
        });

        // categories
        Route::resource('categories', CategoryController::class);

        // options
        Route::resource('options', OptionController::class);

        // option value
        Route::name('suboptions.')->controller(OptionValueController::class)->group(function (){
            Route::get('/suboptions', 'index')->name('index');
            Route::post('/suboptions', 'store')->name('store');
            Route::get('/suboptions/{id}', 'show')->name('show');
            Route::put('/suboptions/{id}', 'update')->name('update');
            Route::delete('/suboptions/{id}', 'delete')->name('delete');
        });
    });
    
});