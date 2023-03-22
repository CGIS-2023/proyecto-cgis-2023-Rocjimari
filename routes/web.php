<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('pacientes',PacienteController::class);


// // Autentificacion
// Route::prefix('auth')->group(function(){
//     Route::get('login',[AuthController::class,'login'])->name('login'); 
//     // admin@admin.com -->password
//     Route::post('login',[AuthController::class,'loginVerify'])->name('login.verify');
//     Route::get('register',[AuthController::class,'register'])->name('register');
//     Route::post('register',[AuthController::class,'registerVerify']);   
//     //cerrar sesión
//     Route::post('cerrarSesion',[AuthController::class,'cerrarSesion'])->name('cerrarSesion');


// });


Route::middleware('auth')->group(function(){//autentificar usuario
    Route::get('dashboard', function(){
        return view('dashboard.index');
    })->name('dashboard');
});