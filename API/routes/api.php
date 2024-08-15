<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\WinnersController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('observations', ObservationController::class);
Route::apiResource('winners', WinnersController::class);


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

