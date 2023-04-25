<?php

namespace App\Http\Controllers;

use App\Models\Enfermero;
use Illuminate\Http\Request;

class EnfermeroController extends Controller
{
    

    public function __construct()
    {
        $this->authorizeResource(Medico::class, 'medico');
    }

    public function index(){
        
        $enfermeros = Enfermero::all();

                        //->select('nombre','fecha_entrada')
                        //->where('estado','vivo')
                        //->distenct()//para que no se repitan
                        //->get()
        return view('enfermeros.lista',['enfermeros' => $enfermeros]);
    }


    public function create(){
        return view('enfermeros.create');
    }


    public function store(Request $request){
            Enfermero::create($request->all());  
            return redirect()->action([EnfermeroController::class, 'index']);
            
        }
    

    public function show($id){

        $enfermero = Enfermero::find($id);
        return view('enfermeros.show', ['enfermero' => $enfermero]);
        //devuelve paciente del id buscado 
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
