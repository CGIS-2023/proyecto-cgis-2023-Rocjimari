<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Enfermero {{$enfermero-> nombre}}</title>
</head>
<body>
Editar Enfermero: {{$enfermero-> nombre}}
<br>
 <form method="POST" role="form" action="{{ route('enfermeros.attachPaciente', [$enfermero->id]) }}">
    {{ csrf_field()}} 
    <div class="mt-4">
        <x-label for="paciente_id" :value="__('Paciente')" />
            <x-select id="paciente_id" name="paciente_id" required>
                <option value="">{{__('Elige un Paciente')}}</option>
                @foreach ($pacientes as $paciente)
                <option value="{{$paciente->id}}" @if (old('paciente_id') == $paciente->id) selected @endif>{{$paciente->nombre}} </option>
                @endforeach
            </x-select>
    </div>

                        <div class="mt-4">
                            <x-label for="inicio" :value="__('Inicio de la consulta')" />

                            <x-input id="inicio" class="block mt-1 w-full"
                                     type="date"
                                     name="inicio"
                                     :value="old('inicio')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="fin" :value="__('Fin de la consulta')" />

                            <x-input id="fin" class="block mt-1 w-full"
                                     type="date"
                                     name="fin"
                                     :value="old('fin')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="estado" :value="__('Estado')" />


                            <x-select id="estado" name="estado" required>
                                <option value="">{{__('Elige una opción')}}</option>
                                <option value="Empeoramiento" @if (old('estado') == 'Empeoramiento') selected @endif>Empeoramiento</option>
                                <option value="Continua estable" @if (old('estado') == 'Continua estable') selected @endif>Continua estable</option>
                                <option value="Mejorando" @if (old('estado') == 'Mejorando') selected @endif>Mejorando</option>
                                <option value="Crítico" @if (old('estado') == 'Crítico') selected @endif>Crítico</option>
                                <option value="Recuperado" @if (old('estado') == 'Recuperado') selected @endif>Recuperado</option>
                                <option value="En tratamiento" @if (old('estado') == 'En tratamiento') selected @endif>En tratamiento</option>
                            </x-select>
                        </div>

                        <div>
                            <x-label for="notas" :value="__('Notas')" />

                            <x-input id="notas" class="block mt-1 w-full" type="text" name="notas" :value="old('notas')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button type="button" class="bg-red-800 hover:bg-red-700">
                                <a href={{route('medicos.index')}}>
                                    {{ __('Cancelar') }}
                                </a>
                            </x-button>
                            <x-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-button>
                        </div>

                           
        </form>

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
                
                
                <div class="flex items-center">
                    <x-label for="inicio">Inicio</x-label>
                    <input disabled type="datetime" name="fecha_entrada" value = "{{$paciente->pivot->inicio->format('d/m/Y')}}" >
                </div>
                <div class="flex items-center">
                    <x-label for="fin">Fin</x-label>
                    <input disabled type="datetime" name="fecha_entrada" value = "{{$paciente->pivot->fin->format('d/m/Y')}}" >
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