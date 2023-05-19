<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Enfermero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    //Creamos el constructor para inyectar la dependencia de la clase Paciente
    // protected $pacientes;
    // public function __construct (Paciente $pacientes){
    //     $this->paciente => $pacientes;
    // }


    public function index(Paciente $paciente,User $user){
        // dd($paciente->user()->id);
        // dd($paciente->user);
        // dd(Auth::user()->enfermero->id);
        if (Auth::user()->tipo_usuario_id == 3){
            $pacientes = Auth::user()->enfermero->pacientes()->paginate()->unique();
            // dd($pacientes);
            $id = Auth::user()->enfermero->id;
            

        }
        elseif(Auth::user()->tipo_usuario_id == 2){
            $pacientes = Auth::user()->medico->pacientes()->paginate(21);   

        }
        elseif(Auth::user()->tipo_usuario_id == 1){
            $pacientes = Paciente::all();  

        }

                        //->select('nombre','fecha_entrada')
                        //->where('estado','vivo')
                        //->distenct()//para que no se repitan
                        //->get()
        return view('pacientes.lista',['pacientes' => $pacientes, 'id' => $id]);
    }

    public function count(){
        if (Auth::user()->tipo_usuario_id == 3){
            $pacientes = Auth::user()->enfermero->pacientes()->paginate()->unique();
            $countp = $pacientes->count();
    }
    return view('profile.dashboard',['count' => $countp]);

    }   
        
    
    public function mostrarEnfermeros($id) {
        // Obtener el paciente por su identificador
        $paciente = Paciente::find($id);
    
        
        // Obtener los enfermeros asignados al paciente
        $enfermeros = $paciente->enfermeros()->paginate(21);
    
        // Devolver la vista con la información de los enfermeros
        return view('enfermeros.index', ['enfermeros' => $enfermeros,'paciente' => $paciente]);
        return view('enfermeros.show', ['enfermeros' => $enfermeros,'paciente' => $paciente]);
    }
  

    public function mostrarMedico($id) {
        // Obtener el paciente por su identificador
        $paciente = Paciente::find($id);
    
        // dd($paciente->enfermeros);
        // Obtener los enfermeros asignados al paciente
        $medico = $paciente->medico;
    
        // Devolver la vista con la información de los enfermeros
        return view('medicos.show', ['medico' => $medico,'paciente' => $paciente]);
        
    }

    // public function create(){
    //     $enfermeros = Enfermero::all();
    //     $pacientes = Paciente::all();
    //     return view('pacientes.create');
    //     if(Auth::user()->tipo_usuario_id == 1){
    //         return view('pacientes/create', ['enfermero' => Auth::user()->enfermero, 'pacientes' => $pacientes]);
    //     }
    //     return view('pacientes/create', ['pacientes' => $pacientes, 'enfermeros' => $enfermeros]);
    // }

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
    

    
    public function show(Paciente $paciente){
        // dd($paciente);
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
        public function attach_enfermero(Request $request, Paciente $paciente)
        {
            $this->validateWithBag('attach',$request, [
                'enfermero_id' => 'required|exists:pacientes,id',
                'inicio' => 'required|date',
                'fin' => 'required|date|after:inicio',
                'notas' => 'nullable|string',
                'estado' => 'nullable|string',
            ]);
            $paciente->enfermeros()->attach($request->enfermero_id, [
                'inicio' => $request->inicio,
                'fin' => $request->fin,
                'notas' => $request->notas,
                'estado' => $request->estado
            ]);
            return redirect()->route('paciente.edit', $paciente->id);
        }

        public function detach_medicamento(Paciente $paciente, Enfermero $enfermero)
        {
            $paciente->enfermeros()->detach($enfermero->id);
            return redirect()->route('paciente.edit', $paciente->id);
        }

        public function enfermeros($id)
    {
        $paciente = Paciente::find($id);
        $enfermeros = $paciente->enfermeros;

        return view('pacientes.enfermeros', compact('paciente', 'enfermeros'));
    }
}
