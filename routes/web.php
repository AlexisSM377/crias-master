<?php

use App\Http\Controllers\CriaController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SensorRegistroController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('crias', CriaController::class);
Route::get('crias-eliminadas', [CriaController::class,'criasEliminadas'])->name('crias.eliminadas');
Route::resource('sensores', SensorRegistroController::class);
Route::get('sensores-eliminadas', [SensorRegistroController::class,'sensoresEliminadas'])->name('sensores.eliminadas');
Route::resource('dietas', DietaController::class);
Route::get('crear-dieta/{id}', [DietaController::class,'create'])->name('dietas.crear');
Route::post('crear-dieta/{id}', [DietaController::class,'store'])->name('dietas.crear');
Route::get('dietas-eliminadas', [DietaController::class,'dietasEliminadas'])->name('dietas.eliminadas');
Route::resource('proveedores', ProveedorController::class);
Route::get('proveedores-eliminados', [ProveedorController::class,'proveedoresEliminados'])->name('proveedores.eliminados');
