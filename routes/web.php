<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/test1', 'example-page');
Route::view('/test', 'example-auth');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        Route::view('/gestion-des-frais', 'back.pages.admin.fee')->name('fee');
    });
});

