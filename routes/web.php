<?php

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
//Route::get('/pacientes','App\Http\Controllers\PacienteController@index')->name('paciente');
// Route::get('/pacientes',[PacienteController::class,'index'])->name('pacientes.lista');;
// Route::post('/pacientes/guardar', [PacienteController::class, 'store'])->name('pacientes.store');
// Route::get('/medicos',[MedicoController::class,'index']);

Route::resource('pacientes',PacienteController::class);

