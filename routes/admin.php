<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.loginForm');
    })->name('admin');


    Route::middleware(['auth:admin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
            Route::post('/logout', 'logout')->name('admin.logout');
        });
    });

    Route::middleware(['guest'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/login', 'loginForm')->name('admin.loginForm');
            Route::post('/login', 'login')->name('admin.login');
        });
    });
});
