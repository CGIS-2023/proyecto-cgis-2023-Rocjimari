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
        
        $id = Auth::user()->enfermero->id;
        $pacientes = Auth::user()->enfermero->pacientes->where('id',$pacienteId);
        // dd($pacientes);
        return view('enfermeros.show', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id'=> $id]);

    }
   
       

   
    

    // public function store(Request $request){
    //         Enfermero::create($request->all());  
    //         return redirect()->action([EnfermeroController::class, 'index']);
            
    //     }
    public function store(Request $request)
    {
       
        $cita = new Enfermero($request->all());
        $cita->save();
        session()->flash('success', 'Consulta creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('enfermeros.index');
    }

    
    
    public function edit(Request $request)
    {
        $pacienteId = $request->input('paciente_id');
        $inicio = $request->input('pivot_inicio');

        $enfermero = Auth::user()->enfermero;
        // dd($request->input());
        // $pacientes = $enfermero->pacientes->where('pivot_paciente_id',$pacienteId)->where('pivot_inicio',$inicio);
        
        $pacientes = $enfermero->pacientes()->wherePivot('inicio', $inicio)->where('pacientes.id', $pacienteId)->get();
        // $pacientes = $pacientes->filter(function ($paciente) use ($inicio) {
        //     return $paciente->pivot->inicio == $inicio;
        // });
        

        // dd($pacientes);
        $id = $enfermero->id;        
        if(Auth::user()->tipo_usuario_id == 3){
            return view('enfermeros/edit', ['enfermero' => $enfermero,  'pacientes' => $pacientes,'id' => $id]);
        }
        return view('enfermeros/edit', ['enfermero' => $enfermero, 'pacientes' => $pacientes,'id' => $id]);
    }
    
       

    // public function edit(Enfermero $enfermero){
        
    //     $pacientes = Auth::user()->enfermero->pacientes()->paginate()->unique();
    //     // dd($pacientes);
    //     $id = Auth::user()->enfermero->id;
        
    //     if(Auth::user()->tipo_usuario_id == 3){
    //         return view('enfermeros.edit', ['enfermero' => $enfermero, 'pacientes' => $pacientes, 'id' => $id]);
    //     }

    //     return view('enfermeros.edit', ['enfermero' => $enfermero, 'id' => $id]);
    // }

    // public function update(Request $request,$id){//variable $request contiene campos modificados
    //     $enfermero = Enfermero::find($id);
    //     $enfermero->fill($request->all());// los actualiza
    //     $enfermero->save();//se guarda
    //     $enfermero->pacientes()->sync($request->pacientes);
    //     return redirect()->action([EnfermeroController::class, 'index']);
    //     // una vez guardado vuelve vista listado Pacientes
    //  }

    // public function update(Request $request, $id)
    // {
    //     $enfermero = Enfermero::find($id);
    //     $enfermero->fill($request->all());
    //     $enfermero->save();

    //     // Actualizar la tabla intermedia
    //     $pacienteId = $request->input('paciente_id');
    //     $pivotData = [
    //         'inicio' => $request->input('inicio'),
    //         'fin' => $request->input('fin'),
    //         'estado' => $request->input('estado'),
    //         'notas' => $request->input('notas'),
    //     ];
    //     $enfermero->pacientes()->updateExistingPivot($pacienteId, $pivotData);

    //     return redirect()->action([EnfermeroController::class, 'index']);
    // }
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
        
        $enfermero->pacientes()->sync([$pacienteId => [
            'inicio' => $inicio,
            'fin' => $fin,
            'notas' => $notas,
            'estado' => $estado
        ]]);
        
    // Opcionalmente, puedes redirigir o hacer otras acciones después de guardar los cambios
    
    return redirect()->back()->with('success', 'Los cambios han sido guardados exitosamente.');
}
    
    public function destroy($id){
        $enfermero = Enfermero::find($id);
        $enfermero->delete();
        return redirect()->action([EnfermeroController::class, 'index']);


    }
    public function attach_paciente(Request $request, Enfermero $enfermero)
    {
        
        $this->validateWithBag('attach',$request, [
            'paciente_id' => 'required|exists:pacientes,id',
            'inicio' => 'required|datetime',
            'fin' => 'required|datetime|after:inicio',
            'notas' => 'string',
            'estado' => 'required|string',
        ]);
        $enfermero->pacientes()->attach($request->paciente_id, [
            'inicio' => $request->inicio,
            'fin' => $request->fin,
            'notas' => $request->notas,
            'estado' => $request->estado
        ]);
        return redirect()->route('enfermeros.edit', $enfermero->id);
    }

    public function detach_paciente(Enfermero $enfermero, Paciente $paciente)
    {
        $enfermero->pacientes()->detach($paciente->id);
        return redirect()->route('enfermero.edit', $enfermero->id);
    }

        
}
