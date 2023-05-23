<?php

use App\Models\Enfermedad;
use App\Models\Equipamiento;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnfermeroController;
use App\Http\Controllers\EquipamientoController;

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
        'enfermeros' => EnfermeroController::class,       
        'equipamientos' => EquipamientoController::class, 
        // 'enfermedad' => EnfermedadController::class,
    ]);
});
// Route::middleware('auth')->group(function(){//autentificar usuario

    // Route::get('/pacientes/{paciente_id}/equipamientos', [EquipamientoController::class, 'show'])->name('equipamiento.show');
    Route::get('equipamiento/{id}', [EquipamientoController::class, 'show'])->name('equipamiento.show');

//Obtener enfermedades de un paciente
// Route::get('/pacientes/{paciente}/enfermedades', [PacienteController::class, 'enfermedades'])->name('pacientes.enfermedades');

Route::post('/pacientes/{paciente}/index-enfermero', [PacienteController::class, 'attach_enfermero'])
->name('pacientes.attachEnfermero');

//enfermeros de los pacientes
Route::get('pacientes/{paciente}/enfermeros',[ PacienteController::class, 'mostrarEnfermeros'])->name('pacientes.enfermeros');
//medico del pacientes
Route::get('pacientes/{paciente}/medico',[ PacienteController::class, 'mostrarMedico'])->name('pacientes.medico');
//Consultas de enfermero a un paciente específico
// Route::get('pacientes/{paciente}/enfermeros/{id}',[ EnfermeroController::class, 'consultaEnfermero'])->name('pacientes.enfermeroConsulta');

Route::get('dashboard', [DashboardController::class, 'count'])->name('dashboard');

//
Route::post('/enfermeros/{enfermero}/attach-paciente', [EnfermeroController::class, 'attach_paciente'])
        ->name('enfermeros.attachPaciente');
Route::delete('/enfermeros/{enfermero}/detach-paciente/{paciente}', [EnfermeroController::class, 'detach_paciente'])
        ->name('enfermeros.detachPaciente');

