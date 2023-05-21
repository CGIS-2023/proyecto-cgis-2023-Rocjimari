<?php

namespace App\Http\Controllers;

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

    public function index(){
        
        if (Auth::user()->tipo_usuario_id == 3){
            $enfermeros = Auth::user()->enfermero; 
            
            // dd(enfermeros)
            $id = Auth::user()->enfermero->id;
            // dd($id);
            
  
        }
        return view('enfermeros.index',['enfermeros' => $enfermeros, 'id' => $id]);
    }


    public function show(Request $request,Enfermero $enfermero){

        
        $pacienteId = $request->input('paciente_id');
        // dd($pacienteId);
        $id = Auth::user()->enfermero->id;
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        // dd($request);
       
        
        return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);

    }
   
       

   
    

    // public function store(Request $request){
    //         Enfermero::create($request->all());  
    //         return redirect()->action([EnfermeroController::class, 'index']);
            
    //     }
    public function store(Request $request)
    {
       
        $enfermero = new Enfermero($request->all());
        $enfermero->save();
        session()->flash('success', 'Consulta creada correctamente');
        return redirect()->route('enfermeros.index');
        // dd($pacientes);
        

    }

    
    
    public function edit(Request $request)
    {
        $pacienteId = $request->input('paciente_id');
        $inicio = $request->input('pivot_inicio');

        $enfermero = Auth::user()->enfermero;
        // dd($request->input());
        // $pacientes = $enfermero->pacientes->where('pivot_paciente_id',$pacienteId)->where('pivot_inicio',$inicio);
        
        $pacientes = $enfermero->pacientes()->wherePivot('inicio', $inicio)->where('pacientes.id', $pacienteId)->get();
        // dd($pacientes);
        // $pacientes = $pacientes->filter(function ($paciente) use ($inicio) {
        //     return $paciente->pivot->inicio == $inicio;
        // });
        

        $id = $enfermero->id;        
        if(Auth::user()->tipo_usuario_id == 3){
            return view('enfermeros/edit', ['enfermero' => $enfermero,  'pacientes' => $pacientes,'id' => $id]);
        }
        return view('enfermeros/edit', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id' => $id]);
        
    }
    
       

    public function update(Request $request, Enfermero $enfermero)
    {
        // dd($request->all());
        $pacienteId = $request->input('paciente_id');
        // dd($request);
        $enfermero_id = Auth::user()->enfermero->id;
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');
        $notas = $request->input('notas');
        $estado = $request->input('estado');
        $pacientes = Auth::user()->enfermero->pacientes()->paginate()->unique();
        $enfermero->pacientes()->sync([$pacienteId => [
            'inicio' => $inicio,
            'fin' => $fin,
            'notas' => $notas,
            'estado' => $estado
        ]]);
        
    session()->flash('success', 'Los cambios han sido guardados exitosamente.');
    return view('enfermeros.show',['id' => $enfermero_id, 'pacientes' => $pacientes, 'enfermero' => $enfermero]);
    

}
    
    public function destroy($id){
        $enfermero = Enfermero::find($id);
        $enfermero->delete();
        return redirect()->action([EnfermeroController::class, 'index']);
        

    }
    public function attach_paciente(Request $request, Enfermero $enfermero)
    {
        // dd($request->all());
        // $this->validateWithBag('attach',$request, [
        //     'paciente_id' => 'required|exists:pacientes,id',
        //     'inicio' => 'required|date_format:Y-m-d\TH:i:s',
        //     'fin' => 'required|date_format:Y-m-d\TH:i:s|after:inicio',
        //     'notas' => 'nullable|string',
        //     'estado' => 'required|string',
        // ]);
        
        $pacienteId = $request->input('paciente_id');
        // dd($pacienteId);
        $id = Auth::user()->enfermero->id;
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        $enfermero->pacientes()->attach($request->input('paciente_id'), [
            'inicio' => $request->input('inicio'),
            'fin' => $request->input('fin'),
            'notas' => $request->input('notas'),
            'estado' => $request->input('estado')
        ]);
        // dd($enfermero);
        
        return view('enfermeros.show',['pacientes' => $pacientes,'enfermero' => $enfermero, 'id' => $id]);
    }

    public function detach_paciente(Enfermero $enfermero, Paciente $paciente)
    {
        $enfermero->pacientes()->detach($paciente->id);
        return redirect()->route('enfermero.edit', $enfermero->id);
    }

        
}
