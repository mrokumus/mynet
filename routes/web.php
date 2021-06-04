<?php

use Illuminate\Support\Facades\Route;

//FRONTEND
Route::get('/', function () {
    return view('welcome');
});

//ADMIN ROUTES
Route::middleware(['auth:sanctum', 'verified',])
    ->prefix('dashboard/')
    ->group(function () {
        //Dashboard
        Route::get('/', [App\Http\Controllers\Backend\DashboardController::class, 'render'])->name('dashboard.render');
        //Persons
        Route::resource('/persons',App\Http\Controllers\Backend\PersonController::class)->except('show');
        //Address
        Route::resource('/addresses', App\Http\Controllers\Backend\AddressController::class)->except('show');
    });
