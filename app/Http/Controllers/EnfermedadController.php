<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Medico::class, 'medico');
    }


    // public function index(Paciente $paciente,User $user){
    //     // dd(Auth::user()->tipo_usuario_id == 2);
    //     if (Auth::user()->tipo_usuario_id == 3){
    //         $enfermedades = Auth::user()->enfermero->pacientes()->paginate(21);     
    //     }
    //     elseif(Auth::user()->tipo_usuario_id == 2){
    //         $pacientes = Auth::user()->medico->pacientes()->paginate(21);   

    //     }
    //     elseif(Auth::user()->tipo_usuario_id == 1){
    //         $pacientes = Paciente::all();  

    //     }

    //                     //->select('nombre','fecha_entrada')
    //                     //->where('estado','vivo')
    //                     //->distenct()//para que no se repitan
    //                     //->get()
    //     return view('pacientes.lista',['pacientes' => $pacientes]);
    // }

}
