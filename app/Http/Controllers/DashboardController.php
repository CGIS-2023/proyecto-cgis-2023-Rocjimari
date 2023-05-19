<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function count(){
        if (Auth::user()->tipo_usuario_id == 3){
            $pacientes = Auth::user()->enfermero->pacientes()->paginate()->unique();
            $countp = $pacientes->count();
            $consultas = Auth::user()->enfermero->pacientes->count();
            
    }
    return view('dashboard.dashboard',['countp' => $countp, 'consultas' =>$consultas]);

    }   
}
