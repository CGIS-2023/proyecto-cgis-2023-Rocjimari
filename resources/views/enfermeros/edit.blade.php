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
        @foreach($pacientes as $paciente)
        @once(!@include('layouts.navigationsecondary')== true)
            @include('layouts.navigationsecondary')
        @endonce
        @endforeach    
    </head>
    
    
    <body> 
    
    @if (Auth::user()->tipo_usuario_id == 3)
    @foreach($pacientes as $paciente)
    
    
    <div style="position: relative; margin: 32px 40px; padding: 60px 20px 16px; border: 2px solid #65e221; border-radius: 10px; background: #ffffff">
        <div style="position: absolute; top: 16px; left: 50px; line-height: 32px; padding-left: 275px; padding-right: 275px; border: 2px solid #57d116; border-radius: 5px; background: #bcff3fc3; font-weight: bold; font-size: 17px; text-align: center; font-family: sans-serif">
        Consultas Paciente: {{$paciente->apellidos}}, {{$paciente->nombre}}
        </div>
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form method="POST" action="{{ route('enfermeros.update', $enfermero->id) }}">
                        @csrf
                        @method('put')
        
                        <div class="mt-4">
                            <x-label for="inicio">Inicio</x-label>
                            <input type="datetime-local" name="inicio" value="{{$paciente->pivot->inicio->format('Y-m-d\TH:i:s')}}" >
                        </div>
                        <div class="mt-4">
                            <x-label for="fin">Fin</x-label>
                            <input type="datetime-local" name="fin" value="{{$paciente->pivot->fin->format('Y-m-d\TH:i:s')}}" >
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
                        <div>
                            <x-label for="notas">Notas</x-label>
                            <input class="block mt-1 w-full" type="text" name="notas" value="{{$paciente->pivot->notas}}" />
                        </div>
        
                        <div class="flex items-center justify-end mt-4">
                            <form action="{{route('pacientes.index')}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 10px">Cancelar</button>
                            </form>
                           <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">
                                    Guardar cambios
                                </button>
                            
                        </div> 
                    </form> 
                </div>
            </div>
        </div>
    
    @endforeach
    @endif
    
    <br>
    
    </body>
    </html>
    </x-app-layout>
