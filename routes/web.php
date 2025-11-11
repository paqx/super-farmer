<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::resource('animals', AnimalController::class);
Route::resource('animal-types', AnimalTypeController::class);
Route::resource('contacts', ContactController::class);
Route::get('/', fn() => redirect(route('animals.index')));
