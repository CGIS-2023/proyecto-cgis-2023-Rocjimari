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
    Editar Paciente: {{$paciente->apellidos}},  {{$paciente->nombre}}
    </div>

                
         <tr>
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
            
            <form action="{{ route('enfermeros.update', $enfermero->id) }}" method="POST">
            @csrf
            @method('PUT')
            
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


                            <select id="estado" name="estado" required>
                                <option value="">{{__('Elige una opción')}}</option>
                                <option value="Empeoramiento" {{($paciente->pivot->estado == 'Empeoramiento')? 'selected' : ''}}>Empeoramiento</option>
                                <option value="Continua estable" {{($paciente->pivot->estado == 'Continua estable')? 'selected' : ''}}>Continua estable</option>
                                <option value="Mejorando"{{($paciente->pivot->estado == 'Mejorando')? 'selected' : ''}}>Mejorando</option>
                                <option value="Crítico" {{($paciente->pivot->estado == 'Crítico')? 'selected' : ''}}>Crítico</option>
                                <option value="Recuperado" {{($paciente->pivot->estado == 'Recuperado')? 'selected' : ''}}>Recuperado</option>
                                <option value="En tratamiento" {{($paciente->pivot->estado == 'En tratamiento')? 'selected' : ''}}>En tratamiento</option>
                            </select>
                        </div>
                <div class="mt-4">
                    <x-label for="notas">Notas</x-label>
                    <input class="block mt-1 w-full" type="text"   name="nombre"  value="{{$paciente->pivot->notas}}"required autofocus />
                </div>
                <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('pacientes.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                <a href={{route('pacientes.index')}}>
                                    {{ __('Guardar') }}
                                </a>
                            </x-button>
                

            </div>
            </div>
                <form action="/enfermeros/{{$id}}" method="GET">
                            @csrf
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit" class="btn btn-primary btn-sm"style="margin-left: 10px">Guardar cambios</button>
                </form>
            </form>
</div>
                
        </div>
        </tbody>     
        </div>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Añadir consulta
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <form method="POST" action="{{ route('enfermeros.attachPaciente', [$enfermero->id]) }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="paciente_id" :value="__('Paciente')" />


                            <select id="paciente_id" name="paciente_id" required>
                                <option value="">{{__('Elige un paciente')}}</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{$paciente->id}}" @if (old('paciente_id') == $paciente->id) selected @endif>{{$paciente->nombre}} </option>
                                @endforeach
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

                            <x-input id="notas" class="block mt-1 w-full" type="text" name="comentarios" :value="old('name')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('enfermeros.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
        @endforeach
        @endif

       
        <br>
        <div class="flex items-center justify-end mt-4">
            <button type="button" class="bg-red-800 hover:bg-red-700">
                <a href={{route('enfermeros.index')}}>
                {{ __('Volver al listado') }}
                </a>
            </button>
        
        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
            <a href="{{route('enfermeros.edit', $enfermero->id)}}">Editar</a>
        </div>
        </div>
        
    

</body>
</html>
</x-app-layout>