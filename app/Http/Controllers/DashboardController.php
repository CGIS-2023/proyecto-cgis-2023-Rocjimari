<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Enfermero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function count(){
        if (Auth::user()->tipo_usuario_id == 3){
            
            $enfermero_id = Auth::user()->enfermero->id;
            $pacientes = Paciente::all()->where('enfermero_id',$enfermero_id)->unique();
            // dd($pacientes);

            $countp = $pacientes->count();
            $consultas = Auth::user()->enfermero->pacientes->count();
            
    return view('dashboard.dashboard',['countp' => $countp, 'consultas' =>$consultas]);
            
    }
    if (Auth::user()->tipo_usuario_id == 2){
        $medico_id = Auth::user()->medico->id;
        $pacientes = Paciente::all()->where('medico_id',$medico_id)->unique();
        $countp = $pacientes->count();
        $consultas = Auth::user()->medico->pacientes->count();
        
    return view('dashboard.dashboard',['countp' => $countp, 'consultas' =>$consultas]);
        
    }
    if (Auth::user()->tipo_usuario_id == 4){
        $pacientes = Paciente::all()->count();
        $medicos = Medico::all()->count();
        $enfermeros = Enfermero::all()->count();
        // $medicos= Medico::all()->count();
        
    return view('dashboard.dashboard',['pacientes' => $pacientes,  'medicos' => $medicos, 'enfermeros' =>$enfermeros ]);
        
    }


    }   
}
