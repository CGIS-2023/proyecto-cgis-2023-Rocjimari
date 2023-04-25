<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EnfermeroController;
use App\Http\Controllers\MedicoController;

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
})->middleware(['auth'])->name('dashboard');


// Route::resource('pacientes', PacienteController::class);
// Route::resource('medicos', MedicoController::class);

// require __DIR__.'/auth.php';
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';



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

Route::middleware(['auth'])->group(function () {
    Route::resources([
        
        'pacientes' => PacienteController::class,
        'medicos' => MedicoController::class,
        'enfermero' => EnfermeroController::class,
    ]);
});
// Route::middleware('auth')->group(function(){//autentificar usuario

