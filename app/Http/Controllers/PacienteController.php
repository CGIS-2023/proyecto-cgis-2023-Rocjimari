<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    //Creamos el constructor para inyectar la dependencia de la clase Paciente
    // protected $pacientes;
    // public function __construct (Paciente $pacientes){
    //     $this->paciente => $pacientes;
    // }


    public function index(){
        
        $pacientes = Paciente::all();

                        //->select('nombre','fecha_entrada')
                        //->where('estado','vivo')
                        //->distenct()//para que no se repitan
                        //->get()
        return view('pacientes.lista',['pacientes' => $pacientes]);
    }


    public function create(){
        return view('pacientes.create');
    }


    // public function store(Request $request){//request contiene datos de formulario
    //     $paciente = new Paciente($request->all());// se carga datos en $paciente
    //     $paciente->save();//lo guardamos
    //     return redirect()->action([AlumnoController::class, 'index']);
    //     // una vez guardado vuelve vista listado Pacientes
    // }

    public function store(Request $request){//request contiene datos de formulario
            // $paciente = new Paciente;
            // $paciente->nombre = $request->input('nombre');
            // $paciente->sexo = $request->input('sexo');
            // $paciente->edad = $request->input('edad');
            // $paciente->estado = $request->input('estado');
            // $paciente->save();   
            Paciente::create($request->all());  
            return redirect()->action([PacienteController::class, 'index']);
            
        }
    

    public function show($id){

        $paciente = Paciente::find($id);
        return view('pacientes/show', ['paciente' => $paciente]);
        //devuelve paciente del id buscado 
    }
    

    public function edit(Paciente $paciente){

        return view('pacientes/edit', ['paciente' => $paciente]);
        //retorna un paciente específico 
        //en el formulario de la vista para para poder editarlo
    }

    public function update(Request $request,$id){//variable $request contiene campos modificados
        $paciente = Paciente::find($id);
        $paciente->fill($request->all());// los actualiza
        $paciente->save();//se guarda
        return redirect()->action([PacienteController::class, 'index']);
        // una vez guardado vuelve vista listado Pacientes
     }

    public function destroy($id){
        $paciente = Paciente::find($id);
        $paciente->delete();
        return redirect()->action([PacienteController::class, 'index']);


}
}
