<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\PartyController;
use Illuminate\Support\Facades\Route;

Route::resource('animals', AnimalController::class);
Route::resource('animal-types', AnimalTypeController::class);
Route::resource('parties', PartyController::class);
