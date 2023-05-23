<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
   //Creamos el constructor para inyectar la dependencia de la clase Paciente
    // protected $pacientes;
    // public function __construct (Paciente $pacientes){
    //     $this->paciente => $pacientes;
    // }
    // public function __construct()
    // {
    //     $this->authorizeResource(Medico::class, 'medico');
    // }
    


    public function index(){
        
        $medicos = Medico::all();
        return view('medicos.index',['medicos' => $medicos]);
    }

    


    public function create(){
        return view('medicos.create');
    }


    public function store(Request $request){
        if (Auth::user()->tipo_usuario_id == 4){
            $medico = new Medico($request->all());
            $medico->user_id = 6; // Asignar el user_id del usuario actual
            $medico->save();
            session()->flash('success', 'Médico creado correctamente');
            return redirect()->route('medicos.index');
            // dd($pacientes);
        }
        }
    

    public function show($id){

        $medico = Medico::find($id);
        return view('medicos.show', ['medico' => $medico]);
        //devuelve paciente del id buscado 
    }
    

    public function edit(Medico $medico){

        return view('medicos.edit', ['medico' => $medico]);
    }

    public function update(Request $request,$id){//variable $request contiene campos modificados
        $medico = Medico::find($id);
        $medico->fill($request->all());// los actualiza
        $medico->save();//se guarda
        return redirect()->action([MedicoController::class, 'index']);
        // una vez guardado vuelve vista listado Pacientes
     }

    public function destroy($id){
        $medico = Medico::find($id);
        $medico->delete();
        return redirect()->action([MedicoController::class, 'index']);


}
}
