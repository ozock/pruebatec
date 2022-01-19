<?php

use App\Http\Controllers\ActualizarDatosController;
use App\Http\Controllers\DarDatosController;
use App\Http\Controllers\DarDepartamentosController;
use App\Http\Controllers\DarTipoTerceroController;
use App\Http\Controllers\EliminarDatosController;
use App\Http\Controllers\RegistrarDatosController;
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

Route::get('/', [DarDatosController::class, 'datosTipo'])->name('registrar');

Route::get('/registrar', [DarDatosController::class, 'datosTipo'])->name('registrar');

Route::get('/gestionar', [DarDatosController::class, 'datosTerceros'])->name('mostrarTerceros');

Route::post('/registrarTercero',[RegistrarDatosController::class, 'registrar'])->name('registrarDatos');

Route::post('/consultarMun',[DarDatosController::class, 'darMun'])->name('consultarMunicipio');

Route::get('/consultarTercero',[DarDatosController::class, 'darTercero'])->name('consultarTercero');

Route::post('/actualizarDatos',[ActualizarDatosController::class, 'actualizarTercero'])->name('actualizarDatos');

Route::post('/eliminarDatos',[EliminarDatosController::class, 'eliminarTercero'])->name('eliminarDatos');
