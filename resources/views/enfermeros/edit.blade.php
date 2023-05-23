<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/custom-styles.css">

</head>
<body>


@if (Auth::user()->tipo_usuario_id == 3)


    @foreach($pacientes as $paciente)
    @once(!@include('layouts.navigationsecondary')== true)
        @include('layouts.navigationsecondary')
    @endonce

    <div style="  position: relative; margin: 32px 100px;; padding: 60px 20px 16px;  border:2px solid #65e221; ;  border-radius: 10px;  background: #ffffff">
        <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #57d116;  border-radius: 5px;  background: #bcff3fc3;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
        Paciente: {{$paciente->apellidos}},  {{$paciente->nombre}}
        </div>

                    
                    <tr>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                     <form action="{{ route('enfermeros.update', $enfermero->id) }}" method="POST" role="form">
                                @csrf
                                @method('put')
                     <div class="mt-4">
                        <x-label for="paciente_id" :value="__('Paciente')" />
                            <select id="paciente_id" name="paciente_id" disable>
                                @foreach ($pacientes as $paciente)
                                <option value="{{$paciente->id}}" @if (old('paciente_id') == $paciente_id) selected @endif>{{$paciente->nombre}} </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="inicio">Inicio</x-label>
                        <input  type="datetime-local" name="inicio" value = "{{$paciente->pivot->inicio->format('Y-m-d\TH:i:s')}}" >
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="fin">Fin</x-label>
                        <input  type="datetime-local" name="fin" value = "{{$paciente->pivot->fin->format('Y-m-d\TH:i:s')}}" >
                    </div>
                    <div class="mt-4">
                        <x-label for="estado">Estado</x-label>
                        <select id="estado" name="estado" required autofocus>
                        
                                <option value="">{{__('Elige una opción')}}</option>
                                <option value="Empeoramiento" @if ($paciente->pivot->estado == 'Empeoramiento') selected @endif>Empeoramiento</option>
                                <option value="Continua estable" @if ($paciente->pivot->estado == 'Continua estable') selected @endif>Continua estable</option>
                                <option value="Mejorando" @if ($paciente->pivot->estado == 'Mejorando') selected @endif>Mejorando</option>
                                <option value="Crítico" @if ($paciente->pivot->estado == 'Crítico') selected @endif>Crítico</option>
                                <option value="Recuperado" @if ($paciente->pivot->estado == 'Recuperado') selected @endif>Recuperado</option>
                                <option value="En tratamiento" @if ($paciente->pivot->estado == 'En tratamiento') selected @endif>En tratamiento</option>
                            </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="notas">Notas</x-label>
                        <input class="block mt-1 w-full" type="text"   class="block mt-1 w-full" name="notas"  value="{{$paciente->pivot->notas}}"required autofocus />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                            <input type="hidden" name="paciente_id" value="{{ $paciente->pivot->paciente_id }}">
                            <button type="submit"  class="btn btn-success btn-sm" style="margin-left: 10px">Guardar</button>
                       
                            <a href="{{ route('medicos.index') }}" class="btn btn-danger btn-sm" style="margin-left: 10px">{{ __('Cancelar') }}</a>
                            <br>
                    </div>
                    </form>
                    
                    
                   

                </div>
                </div>
            </div>
            </tbody>     
            </div>
    
            @endforeach
            

                           
        
@endif



        
        @if (Auth::user()->tipo_usuario_id == 2)
        <div style="  position: relative; margin: 32px 16px;; padding: 60px 20px 16px;  border:2px solid #dad4ff; ;  border-radius: 10px;  background: #ffffff">
            <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #7f71d3;  border-radius: 5px;  background: #a59cd8a5;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
            Enfermero:  {{ $enfermero->apellidos}} ,     {{$enfermero->nombre}} 
            </div>
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        
                        <div class="py-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" class="block mt-1 w-full" name="nombre" 
                            value="{{$enfermero-> nombre}}"required autofocus />
                        </div>
                        <div class="py-12">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control"  class="block mt-1 w-full" name="apellidos" 
                            value="{{$enfermero-> apellidos}}"required autofocus />
                        </div>

                        <form action={{route('enfermeros.update', $enfermero->id)}} method="GET">
                            @csrf
                            <input type="hidden" name="enfermero" value="{{ $enfermero }}">
                            <button type="submit" class="btn btn-success btn-sm"style="margin-left: 10px">Editar</button>
                        </form>
                        </div>

                </div>
                </div>
                </div>
                
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
        </div> @endif

       
        
        
    
</body>
</html>
</x-app-layout>