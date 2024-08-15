<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\WinnersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión exitosa a la base de datos';
    } catch (\Exception $e) {
        return 'Error al conectar a la base de datos: ' . $e->getMessage();
    }
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/observations', [ObservationController::class, 'index']);
Route::post('/observations', [ObservationController::class, 'store']);
Route::put('/observations/{id}', [ObservationController::class, 'update']);
Route::delete('/observations/{id}', [ObservationController::class, 'destroy']);

Route::get('/winners', [WinnersController::class, 'index']);
Route::post('/winners', [WinnersController::class, 'store']);
Route::put('/winners/{id}', [WinnersController::class, 'update']);
Route::delete('/winners/{id}', [WinnersController::class, 'destroy']);
