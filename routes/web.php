<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

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



//Autentificacion
Route::view('/login','login')->name('login');
Route::view('/registro','register')->name('registro');


Route::view('/privada', "secret")->middleware('auth')->name('privada');
//Middleware credenciales son correctas le deja a entrar sino se vuelve al login para iniciar sesion

Route::post('/validar-registro', [LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion', [LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
