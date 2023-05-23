<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Equipamiento;

class EquipamientoController extends Controller
{
   
    public function index()
    {
        $equipamientos = Equipamiento::all();
        return view('equipamientos.index',['equipamientos' => $equipamientos]);
    }
    public function show($id){

        $equipamiento = Equipamiento::find($id);
        return view('equipamientos/show', ['equipamiento' => $equipamiento]);
    }
}
