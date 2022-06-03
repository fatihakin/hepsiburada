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

Route::get('/test', [\App\Http\Controllers\TestController::class, 'index2']);

