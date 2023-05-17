<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Enfermero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnfermeroController extends Controller
{
    

    // public function __construct()
    // {
    //     $this->authorizeResource(Enfermero::class, 'enfermero');
    // }

    public function index(){
        
        if (Auth::user()->tipo_usuario_id == 3){
            $enfermeros = Auth::user()->enfermero; 
            
            // dd(enfermeros)
            $id = Auth::user()->enfermero->id;
            // dd($id);
  
        }
        return view('enfermeros.index',['enfermeros' => $enfermeros, 'id' => $id]);
    }

    // public function index(){
        
    //     $enfermeros = Enfermero::all();
    //     return view('enfermeros.index',['enfermeros' => $enfermeros]);
    // }

    public function create(){
        return view('enfermeros.create');
    }

    public function show(Request $request,Enfermero $enfermero){
        $pacienteId = $request->input('paciente_id');
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        // dd($pacientes);
        return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes]);

    }
   
       

    // public function show($id) {
        
    //     $paciente = Paciente::find($id);
    //     $enfermero = Auth::user()->enfermero;
    //     if (Auth::user()->tipo_usuario_id == 3) {
    //         // dd(Auth::user()->enfermero->pacientes->where('id',$id)->map->id);
    //         if(Auth::user()->enfermero->pacientes->where('id',$id)->pluck('id')->first()== $id)
    //             $enfermero = 
    //             return view('enfermeros.show', ['enfermero' => $enfermero]);
    //     }
    // }

    // public function show(Enfermero $enfermero){
        
    //     if (Auth::user()->tipo_usuario_id == 3){
    //         // $paciente = Paciente::find($id);
            
    //         $id_enf = Auth::user()->enfermero->id;

    //         $paciente = $enfermero->pacientes()->where('enfermero_paciente.enfermero_id',$id_enf)->get(); 

    //         // $id_enf_pac = Paciente-;
    //         dd($paciente);
    //         // $enfermero = Enfermero::where('id', $paciente->enfermero_id)->get();
            
    //         return view('enfermeros.show', ['enfermero' => $enfermero]);
    //     }
    // }


    // public function show($id){

    //     $enfermero = Enfermero::find($id);
    //     return view('enfermeros.show', ['enfermero' => $enfermero]);
    //     //devuelve paciente del id buscado 
    // }
    

    public function store(Request $request){
            Enfermero::create($request->all());  
            return redirect()->action([EnfermeroController::class, 'index']);
            
        }
    

        

    

    public function edit(Enfermero $enfermero){

        return view('enfermeros.edit', ['enfermero' => $enfermero]);
    }

    public function update(Request $request,$id){//variable $request contiene campos modificados
        $enfermero = Enfermero::find($id);
        $enfermero->fill($request->all());// los actualiza
        $enfermero->save();//se guarda
        return redirect()->action([EnfermeroController::class, 'index']);
        // una vez guardado vuelve vista listado Pacientes
     }

    public function destroy($id){
        $enfermero = Enfermero::find($id);
        $enfermero->delete();
        return redirect()->action([EnfermeroController::class, 'index']);


}
        
}
