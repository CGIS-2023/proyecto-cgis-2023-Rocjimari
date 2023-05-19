<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    




@if (Auth::user()->tipo_usuario_id == 3)

@foreach($pacientes as $paciente)
@once(!@include('layouts.navigationsecondary')== true)
    @include('layouts.navigationsecondary')
@endonce

<div style="  position: relative; margin: 32px 40px;; padding: 60px 20px 16px;  border:2px solid #65e221; ;  border-radius: 10px;  background: #ffffff">
    <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #57d116;  border-radius: 5px;  background: #bcff3fc3;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
    Paciente: {{$paciente->apellidos}},  {{$paciente->nombre}}
    </div>

                
                <tr>
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                
                <div class="mt-4">
                    <x-label for="inicio">Inicio</x-label>
                    <input disabled type="datetime-local" name="inicio" value = "{{$paciente->pivot->inicio->format('Y-m-d\TH:i:s')}}" >
                </div>
                <div class="mt-4">
                    <x-label for="fin">Fin</x-label>
                    <input disabled type="datetime-local" name="fin" value = "{{$paciente->pivot->fin->format('Y-m-d\TH:i:s')}}" >
                </div>
                <div class="mt-4">
                    <x-label for="estado">Estado</x-label>
                    <input class="block mt-1 w-full" type="text"   readonly disabled class="block mt-1 w-full" name="nombre"  value="{{$paciente->pivot->estado}}"required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="notas">Notas</x-label>
                    <input class="block mt-1 w-full" type="text"  readonly disabled class="block mt-1 w-full" name="nombre"  value="{{$paciente->pivot->notas}}"required autofocus />
                </div>
                

            </div>
            </div>
            <br>
        <div class="flex items-center justify-end mt-4">
            <button type="button" class="bg-red-800 hover:bg-red-700">
                <a href={{route('enfermeros.index')}}>
                {{ __('Volver al listado') }}
                </a>
            </button>
        
        <form action={{route('enfermeros.edit', $enfermero->id)}} method="GET">
            @csrf
             <input type="hidden" name="paciente_id" value="{{ $paciente->pivot->paciente_id }}">
             <input type="hidden" name="pivot_inicio" value="{{ $paciente->pivot->inicio }}">
            <button type="submit" class="btn btn-primary btn-sm"style="margin-left: 10px">Editar</button>
        </form>
        </div>
        
        </div>
        </tbody>     
        </div>
   
        @endforeach
        @endif



        
        @if (Auth::user()->tipo_usuario_id == 2)
                    <div class="py-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="nombre" 
                        value="{{$enfermero-> nombre}}"required autofocus />
                    </div>
                    <div class="py-12">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="apellidos" 
                        value="{{$enfermero-> apellidos}}"required autofocus />
                    </div>

                </div>
                </div>
            
        </div>
        @endif

       
        
    

</body>
</html>
</x-app-layout>