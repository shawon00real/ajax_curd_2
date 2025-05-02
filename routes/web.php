<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;


Route::get('/', [CustomerController::class, 'index']);
Route::post('/create', [CustomerController::class, 'create'])->name('create');
Route::post('/delete', [CustomerController::class, 'delete'])->name('delete');
Route::post('/update', [CustomerController::class, 'update'])->name('update');

