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
@endforeach
@endif
@if (Auth::user()->tipo_usuario_id == 2)
@isset($paciente)
@include('layouts.navigationsecondary')
@endisset
@endif


@if (Auth::user()->tipo_usuario_id == 3)

  
    
@foreach($pacientes as $paciente)


<div style="  position: relative; margin: 32px 40px;; padding: 60px 20px 16px;  border:2px solid #65e221; ;  border-radius: 10px;  background: #ffffff">
    <div  style="position: absolute; top: 26px; right: 50px; ">
    <form action="{{route('enfermeros.show', $id)}}" method="GET">
                    @csrf
                    <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                    <button type="submit" class="btn btn-warning btn-sm" style="margin-left: 10px; border: 2px solid #57d116;">Recargar consultas</button>
                </form>
    </div>
            
    <div style="position: absolute; top: 26px; right: 200px;  left: 50px;  line-height: 32px;  padding-left: 175px;  padding-right: 175px;  border: 2px solid #57d116;  border-radius: 5px;  background: #bcff3fc3;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
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
                
        
        <form action="/pacientes" method="GET">
            @csrf
             
            <button type="submit" class="btn btn-primary btn-sm"style="margin-left: 10px">Volver al listado</button>
        </form>
        <form action={{route('enfermeros.edit', $enfermero->id)}} method="GET">
            @csrf
             <input type="hidden" name="paciente_id" value="{{ $paciente->pivot->paciente_id }}">
             <input type="hidden" name="pivot_inicio" value="{{ $paciente->pivot->inicio }}">
            <button type="submit" class="btn btn-success btn-sm"style="margin-left: 10px">Editar</button>
        </form>
        
        
        </div>
        </div>   
        </div>
   
   
        @endforeach
        @foreach($pacientes as $paciente)
               <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Añadir consulta
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <form method="POST" action="{{ route('enfermeros.attachPaciente', $enfermero->id) }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="paciente_id" :value="__('Paciente')" />


                            <select id="paciente_id" name="paciente_id" required>
                                <option value="">{{__('Elige un paciente')}}</option>
                                    <option value="{{$paciente->id}}" selected >{{$paciente->nombre}} </option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="inicio" :value="__('Inicio de la consulta')" />

                            <x-input id="inicio" class="block mt-1 w-full"
                                     type="datetime-local"
                                     name="inicio"
                                     :value="old('inicio')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="fin" :value="__('Fin de la consulta')" />

                            <x-input id="fin" class="block mt-1 w-full"
                                     type="datetime-local"
                                     name="fin"
                                     :value="old('fin')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="estado" :value="__('Estado')" />


                            <select id="estado" name="estado" required>
                                <option value="">{{__('Elige una opción')}}</option>                
                                <option value="Empeoramiento" @if (old('estado') == $paciente->pivot->estado) selected @endif>Empeoramiento</option>
                                <option value="Continua estable" {{($paciente->pivot->estado)? 'selected' : ''}}>Continua estable</option>
                                <option value="Mejorando"{{($paciente->pivot->estado)? 'selected' : ''}}>Mejorando</option>
                                <option value="Crítico" {{($paciente->pivot->estado)? 'selected' : ''}}>Crítico</option>
                                <option value="Recuperado" {{($paciente->pivot->estado)? 'selected' : ''}}>Recuperado</option>
                                <option value="En tratamiento" {{($paciente->pivot->estado)? 'selected' : ''}}>En tratamiento</option>                               
                            </select>
                        </div>

                        <div>
                            <x-label for="notas" :value="__('Notas')" />

                            <x-input id="notas" class="block mt-1 w-full" type="text" name="notas" :value="old('notas')" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                        <form action="{{route('enfermeros.show', $id)}}" method="GET">
                            @csrf
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">Guardar cambios</button>
                        </form>
                        <form action="{{route('pacientes.index')}}" method="GET">
                            @csrf
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit" class="btn btn-danger btn-sm"style="margin-left: 10px">Cancelar</button>
                        </form>
                    </form>
                    
                        </div>   
                </div>
            </div>
        </div>
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
            </div>
        </div>
            
        </div>
        @endif

       
        
    

</body>
</html>
</x-app-layout>