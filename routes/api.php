<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CriaController;
use App\Http\Controllers\Api\DietaController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('crias', CriaController::class);
Route::resource('dietas', DietaController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('sensores', SensorController::class);
