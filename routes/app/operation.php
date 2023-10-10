<?php

use App\Http\Livewire\In\OperationEditComp;
use illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        Route::get('/operations', function() {
            return view('back.pages.admin.operations.create');
        });
        /* don't work */
        /* Route::get('/semence/create', function() {
            return view('back.pages.admin.operations.create')->name('semence-create');
        }); */
        Route::view('/operation/create', 'back.pages.admin.operations.create')->name('operation-create');
        Route::get('/operation/{operation}/edit', OperationEditComp::class)->name('operation-edit');

        Route::view('/operation/type', 'back.pages.admin.operations.type')->name('operation-type');
    });
});

