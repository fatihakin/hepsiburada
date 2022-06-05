<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V2 Routes
| prefix : api/v2
|--------------------------------------------------------------------------
|
*/

Route::resource('plateaus', \App\Http\Controllers\V2\PlateauController::class)->only(['store', 'show', 'index']);
//Route::resource('rovers', \App\Http\Controllers\V2\RoverController::class)->only(['show']);
//Route::put('rovers/{id}/update-state', [\App\Http\Controllers\V2\RoverController::class , 'updateState']);
//Route::resource('plateaus.rovers', \App\Http\Controllers\V2\PlateauRoverController::class)->only(['store', 'index']);
//Route::resource('rovers.rover-states', \App\Http\Controllers\V2\RoverStateController::class)->only(['index']);


