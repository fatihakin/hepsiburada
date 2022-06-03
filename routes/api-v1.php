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

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
