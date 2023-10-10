<?php

use illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function() {
        Route::view('/login', 'back.pages.admin.auth.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        Route::view('/home', 'back.pages.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/profile', [AdminController::class, 'profileView'])->name('profile');
    });

});
