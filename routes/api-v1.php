<?php

use App\Http\Controllers\V1\PlateauController;
use App\Http\Controllers\V1\PlateauRoverController;
use App\Http\Controllers\V1\RoverController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
| prefix : api/v1
|--------------------------------------------------------------------------
|
*/
Route::resource('plateaus', PlateauController::class)->only(['store', 'show', 'index']);
Route::resource('rovers', RoverController::class)->only(['show']);
Route::put('rovers/{id}/update-state', [RoverController::class , 'updateState']);
Route::resource('plateaus.rovers', PlateauRoverController::class)->only(['store', 'index']);

