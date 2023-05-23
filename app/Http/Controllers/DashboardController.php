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
            // $id = Auth::user()->enfermero->id;
            // // dd($id);
            // $pacientes = Paciente::where('enfermero_id', $id)->pluck('id')->unique();
            // $pacientes = Paciente::whereIn('id', $pacientes)->get();
            $pacientes = Auth::user()->enfermero->pacientes()->paginate()->unique();
            $countp = $pacientes->count();
            $consultas = Auth::user()->enfermero->pacientes->count();
            
    return view('dashboard.dashboard',['countp' => $countp, 'consultas' =>$consultas]);
            
    }
    if (Auth::user()->tipo_usuario_id == 2){
        $pacientes = Auth::user()->medico->pacientes()->paginate()->unique();
        $countp = $pacientes->count();
        $consultas = Auth::user()->medico->pacientes->count();
        
    return view('dashboard.dashboard',['countp' => $countp, 'consultas' =>$consultas]);
        
    }
    if (Auth::user()->tipo_usuario_id == 1){
        $pacientes = Paciente::all()->count();
        $enfermeros = Enfermero::all()->count();
        $medicos= Medico::all()->count();
        
    return view('dashboard.dashboard',['pacientes' => $pacientes, 'enfermeros' => $enfermeros ]);
        
    }


    }   
}
