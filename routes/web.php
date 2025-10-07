<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('admin.pages.dashboard');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



    Route::post('items/datatable/get', [App\Http\Controllers\ItemController::class, 'datatable'])->name('items.datatable');
    Route::resource('items', App\Http\Controllers\ItemController::class)->except(['show']);
    Route::post('suppliers/datatable/get', [App\Http\Controllers\SupplierController::class, 'datatable'])->name('suppliers.datatable');
    Route::resource('suppliers', App\Http\Controllers\SupplierController::class)->except(['show']);
    Route::post('clients/datatable/get', [App\Http\Controllers\ClientController::class, 'datatable'])->name('clients.datatable');
    Route::resource('clients', App\Http\Controllers\ClientController::class)->except(['show']);





    Route::post('invoice_parameters/datatable/get', [App\Http\Controllers\InvoiceParametersController::class, 'datatable'])->name('invoice_parameters.datatable');
    Route::resource('invoice_parameters', App\Http\Controllers\InvoiceParametersController::class);
    Route::post('invoice_parameters/pdf/generate/{invoice_parameter}', [App\Http\Controllers\InvoiceParametersController::class, 'generatepdf'])->name('invoice_parameters.generatepdf');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
