<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Enfermero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EnfermeroController;

class EnfermeroController extends Controller
{
    

    // public function __construct()
    // {
    //     $this->authorizeResource(Enfermero::class, 'enfermero');
    // }

    public function index(Request $request){
        
        if (Auth::user()->tipo_usuario_id == 3){
            $enfermeros = Auth::user()->enfermero; 
            
            // dd(enfermeros)
            $id = Auth::user()->enfermero->id;
            // dd($id);
            return view('enfermeros.index',['enfermeros' => $enfermeros, 'id' => $id]);
  
        }
        if (Auth::user()->tipo_usuario_id == 2){
            $pacienteid = $request->paciente;
            $paciente = Paciente::find($pacienteid);
            $enfermeroId = $paciente->enfermero_id;
            // $enfermeros = Enfermero::all(); 
            $enfermeros = Enfermero::find($enfermeroId); 
            // dd($paciente->enfermero_id);
            // dd($enfermeros);
            
            return view('enfermeros.index',['enfermeros' => $enfermeros, 'id' => $enfermeroId, 'paciente' => $paciente]);
        }
        if (Auth::user()->tipo_usuario_id == 4){
            $pacientes = Paciente::all();
            // $enfermeros = Enfermero::all(); 
            $enfermeros = Enfermero::all(); 
            // dd($paciente->enfermero_id);
            // dd($enfermeros);
            
            
            return view('enfermeros.index',['enfermeros' => $enfermeros,  'pacientes' => $pacientes]);
        }
        
        return view('enfermeros.index',['enfermeros' => $enfermeros, 'id' => $id]);
    }


    public function show(Request $request,Enfermero $enfermero,Medico $medico){

        if (Auth::user()->tipo_usuario_id == 3){
            $pacienteId = $request->input('paciente_id');
            // dd($request->input());
            // dd($pacienteId);
            // dd($enfermero->pacientes);
            $id = Auth::user()->enfermero->id;
            $pacientes = $enfermero->pacientes->where('id',$pacienteId);
            // dd($pacientes);
            // $pacientes = Paciente::wherePivot('', $id)->pluck('id')->unique();
            // $pacientes = Paciente::where('enfermero_id', $id)->where('id',$pacienteId)->get();
            // dd($pacientes);
            

            // $pacientes = Paciente::whereIn('id', $pacientes)->get();
            // dd($pacientes);
            // $paciente = Paciente::find($pacienteId);
            // dd(Auth::user()->enfermero->pacientes);
        
            
            return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);
        }
        if (Auth::user()->tipo_usuario_id == 2){
            // // dd($request->all());
            // // $pacienteId = $request->input('paciente_id');
            // // $paciente = Paciente::find($pacienteId);            
            // // $pacientes = $medico->pacientes->where('id',$pacienteId);
            // // $id = $request->input('enfermero_id');         
            $pacientes = Paciente::all();
            
            // dd($pacienteId);
            // $id = Auth::user()->enfermero->id;
            // $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
            // dd($request);
        
            
            return view('enfermeros.show', ['enfermero' => $enfermero,  'pacientes' => $pacientes]);
        }
        if (Auth::user()->tipo_usuario_id == 4){
            // dd($request->all());
            $enfermeroId = $request->input('enfermero_id');
            $enfermero = Enfermero::find($enfermeroId);
            $pacientes = Paciente::all();
            return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes]);
        }
        

    }
    public function consulta(){

        
        if (Auth::user()->tipo_usuario_id == 3){
            $enfermero_id = Auth::user()->enfermero->id; 
            $enfermero = Auth::user()->enfermero;
            $pacientes = Paciente::all();
            $pacientes = $pacientes->where('enfermero_id',$enfermero_id);

            // dd($pacientes);
            // $pacienteId = $request->input('paciente_id');
            // dd($request->input());

            // dd($pacienteId);
            $id = Auth::user()->enfermero->id;
            // $pacientes = $enfermero->pacientes->where('id',$pacienteId);
            // dd($enfermero->pacientes);
            // $pacientes = Paciente::wherePivot('', $id)->pluck('id')->unique();
            // $pacientes = Paciente::where('enfermero_id', $id)->where('id',$pacienteId)->get();
            // dd($pacientes);
            

            // $pacientes = Paciente::whereIn('id', $pacientes)->get();
            // dd($pacientes);
            // $paciente = Paciente::find($pacienteId);
            // dd(Auth::user()->enfermero->pacientes);
        
            return view('enfermeros.consulta', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);
            
            // return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);
        }
        if (Auth::user()->tipo_usuario_id == 4){
            $enfermero = Auth::user()->enfermero;
            $pacientes = Paciente::all();

            // dd($pacientes);
            
        
            return view('enfermeros.consulta', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);
            
            // return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);
        }
        
        

    }
   
       
    public function store(Request $request)
    {
        // dd($request->input());
        if (Auth::user()->tipo_usuario_id == 2){
            
        // dd($request->input());
            $enfermero = new Enfermero($request->all());
            $enfermero->save();
            return redirect()->route('enfermeros.index');
            // dd($pacientes);
            }
        if (Auth::user()->tipo_usuario_id == 3){
            $enfermero = new Enfermero($request->all());
            $enfermero->save();
            session()->flash('success', 'Consulta creada correctamente');
            return redirect()->route('enfermeros.index');
            // dd($pacientes);
        }
        if (Auth::user()->tipo_usuario_id == 4){
            $enfermero = new Enfermero($request->all());
            $enfermero->user_id = 6; // Asignar el user_id del usuario actual
            $enfermero->save();
            session()->flash('success', 'Consulta creada correctamente');
            return redirect()->route('enfermeros.index');
            // dd($pacientes);
        }

    }
    
    public function create(){
        $enfermeros = Auth::user()->enfemero;
        // dd(Enfermero::all());
        $medico = Medico::all();
        return view('enfermeros.create',[ 'medico' => $medico, 'enfermeros'=> $enfermeros]);
    }
    

    
    
    public function edit(Request $request, Enfermero $enfermero)
    {
        if(Auth::user()->tipo_usuario_id == 2){
            // dd($request->all());
            $pacienteId = $request->input('paciente_id');
            
            $id = $request->input('enfermero_id');
            // dd($id);
            $enfermero = Enfermero::find($id);
            // dd($enfermero);
            $pacientes = Paciente::find($pacienteId);
            // dd($request->input()); 
            return view('enfermeros/edit', ['enfermero' => $enfermero,  'pacientes' => $pacientes,'id' => $id]);
        }
        
        if(Auth::user()->tipo_usuario_id == 4){
            
            return view('enfermeros/edit', ['enfermero' => $enfermero]);
          
            
        }
        if(Auth::user()->tipo_usuario_id == 3){
            
            $pacienteId = $request->input('paciente_id');
            $inicio = $request->input('pivot_inicio');
           


            $enfermero = Auth::user()->enfermero;
            // dd($request->input());
            // $pacientes = $enfermero->pacientes->where('pivot_paciente_id',$pacienteId)->where('pivot_inicio',$inicio);
            // dd($enfermero->pacientes());
            $pacientes = $enfermero->pacientes()->wherePivot('inicio', $inicio)->where('paciente_id', $pacienteId)->get()->unique();

            
            // dd( $enfermero->pacientes()->wherePivot('inicio', $inicio)->where('paciente_id', $pacienteId)->get());
            // dd($enfermero->pacientes()->wherePivot('inicio', $inicio)->get());
            $id = $enfermero->id;        
            return view('enfermeros/edit', ['enfermero' => $enfermero,  'pacientes' => $pacientes,'id' => $id, 'paciente_id' => $pacienteId]);
        }
        // return view('enfermeros/edit', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id' => $id]);
        
    }
    

     
    public function update(Request $request, Enfermero $enfermero)
    {
        if(Auth::user()->tipo_usuario_id == 2){
        // dd($request->all());
        $pacienteId = $request->input('paciente_id');
        // dd($request->input('paciente_id'));
        $enfermero_id = Auth::user()->enfermero->id;
        $datos = $request->all();
        // dd($datos);
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        
        $enfermero = Enfermero::find($enfermero_id);
        $enfermero->pacientes()->updateExistingPivot($pacienteId, $datos);
        
        session()->flash('success', 'Los cambios han sido guardados exitosamente.');
        return view('enfermeros.show',['id' => $enfermero_id, 'pacientes' => $pacientes, 'enfermero' => $enfermero]);
        
    }
    
        if(Auth::user()->tipo_usuario_id == 3){
        // dd($request->all());
        $pacienteId = $request->input('paciente_id');    
        $inicio = $request->input('inicio');

        // dd($request->input('inicio'));
        $enfermero_id = Auth::user()->enfermero->id;
        $datos = $request->all();
        // dd($datos);
        $pacientes = $enfermero->pacientes()->where('paciente_id', $pacienteId)->get();
        // dd($pacientes);
        $enfermero = Enfermero::find($enfermero_id);
        $enfermero->pacientes()->wherePivot('inicio', $inicio)->where('paciente_id', $pacienteId)->updateExistingPivot($pacienteId, $datos);

        
        
        // $enfermero->pacientes()->updateExistingPivot($pacienteId, $datos);
        
        session()->flash('success', 'Los cambios han sido guardados exitosamente.');
    return view('enfermeros.show',['id' => $enfermero_id, 'pacientes' => $pacientes, 'enfermero' => $enfermero]);
        }
        if(Auth::user()->tipo_usuario_id == 4){
        $enfermero = Enfermero::find($enfermero->id);
        // dd($enfermero);
        $enfermero->fill($request->all());// los actualiza
        $enfermero->save();//se guarda
        return redirect()->action([EnfermeroController::class, 'index']);
        }
        
        
    
    

}
    
    public function destroy($id){
        if(Auth::user()->tipo_usuario_id == 3){
        $enfermero = Enfermero::find($id);
        $enfermero->delete();
        return redirect()->action([EnfermeroController::class, 'index']);
        }
        if(Auth::user()->tipo_usuario_id == 4){
            $enfermero = Enfermero::find($id);
            $enfermero->delete();
            return redirect()->action([EnfermeroController::class, 'index']);
            }
            


    }
    public function attach_paciente(Request $request, Enfermero $enfermero)
    {
        // dd($request->all());
        // $this->validateWithBag('attach',$request, [
        //     'inicio' => 'required|date_format:Y-m-d\TH:i:s',
        //     'fin' => 'required|date_format:Y-m-d\TH:i:s|after:inicio',
        //     'notas' => 'nullable|string',
        //     'estado' => 'required|string',
        // ]);
        
        $pacienteId = $request->input('paciente_id');
        // dd($pacienteId);
        $id = Auth::user()->enfermero->id;
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        // dd($pacientes);
        $enfermero->pacientes()->attach($request->input('paciente_id'), [
            'inicio' => $request->input('inicio'),
            'fin' => $request->input('fin'),
            'notas' => $request->input('notas'),
            'estado' => $request->input('estado')
        ]);
        // dd($enfermero);
        
        return view('enfermeros.show',['pacientes' => $pacientes,'enfermero' => $enfermero, 'id' => $id]);
    }

        public function detach_paciente(Enfermero $enfermero, Paciente $paciente, Request $request)
    {
        // $pacienteId = $paciente->id;
        // $inicio = $request->input('inicio');
        // $enfermero->pacientes()->wherePivot('inicio', $inicio)->where('pacientes.id', $pacienteId)->detach($pacienteId);

        // // dd($pacientes);

        // $id = Auth::user()->enfermero->id;
        // $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        $pacienteId = $request->input('paciente_id');
        // dd($pacienteId);
        $id = Auth::user()->enfermero->id;
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        $enfermero->pacientes()->detach($request->input('paciente_id'), [
            'inicio' => $request->input('inicio'),
            'fin' => $request->input('fin'),
            'notas' => $request->input('notas'),
            'estado' => $request->input('estado')
        ]);
        return view('enfermeros.show',['pacientes' => $pacientes,
        'enfermero' => $enfermero, 'id' => $id, 'paciente' => $paciente]);
    }

        
}
