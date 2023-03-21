<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Auth\AuthController;

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


// Autentificacion
Route::prefix('auth')->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('login'); 
    // admin@admin.com -->password
    Route::post('login',[AuthController::class,'loginVerify'])->name('login.verify');
    Route::get('register',[AuthController::class,'register'])->name('register');
    Route::post('register',[AuthController::class,'registerVerify']);   
    //cerrar sesión
    Route::post('cerrarSesion',[AuthController::class,'cerrarSesion'])->name('cerrarSesion');


});


Route::middleware('auth')->group(function(){//autentificar usuario
    Route::get('dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard');
});
