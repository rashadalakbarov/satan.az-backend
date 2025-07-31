<?php

use Illuminate\Support\Facades\Route;

// admin panel
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MyCompanyController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ElanlarController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OptionController;
use App\Http\Controllers\admin\OptionValueController;

// frontend
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\AuthFrontController;

// profile
use App\Http\Controllers\profile\DashboardProfileController;

Route::prefix('admin')->name('admin.')->controller(AuthController::class)->group(function () {
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

// home
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::controller(AuthFrontController::class)->middleware(['profile.guest'])->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/send-otp', 'sendOtp')->name('send-otp');
    Route::post('/verify-otp', 'verifyOtp')->name('verify-otp');
});

// profile
Route::prefix('profile')->middleware(['web', 'auth:phone'])->name('profile.')->group(function(){
    Route::get('/', [DashboardProfileController::class, 'index'])->name('index');
    Route::get('/logout', [DashboardProfileController::class, 'logout'])->name('logout');

    Route::put('/user/{phone}', [DashboardProfileController::class, 'user'])->name('user.update');
});
