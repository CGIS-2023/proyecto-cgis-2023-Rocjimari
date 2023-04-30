<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use App\Models\Equipamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipamientoController extends Controller
{
   

    public function index(){
        // $paciente = Paciente::find($id);
        // if (Auth::user()->tipo_usuario_id == 2){
            // $equipamientos = $paciente->equipamientos()->paginate(21);    
            $equipamientos = Equipamiento::all(); 
        // }
        return view('equipamientos.index',['equipamientos' => $equipamientos]);
    }
}
