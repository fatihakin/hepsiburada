<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
| prefix : api/v1
|--------------------------------------------------------------------------
|
*/

Route::apiResources([
    'plateaus' => \App\Http\Controllers\V1\PlateauController::class,
    'rovers' => \App\Http\Controllers\V1\RoverController::class,
]);
