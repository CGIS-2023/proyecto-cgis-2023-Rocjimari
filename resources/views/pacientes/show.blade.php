
<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>


<body>
    
    @include('layouts.navigationsecondary')
      
<br> 
    
<div style="  position: relative; margin: 32px 16px;; padding: 60px 20px 16px;  border:2px solid #dad4ff; ;  border-radius: 10px;  background: #ffffff">
    <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #7f71d3;  border-radius: 5px;  background: #a59cd8a5;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
    Paciente:  {{ $paciente->apellidos}} ,     {{$paciente->nombre}} 
    </div>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="mt-4">
                    <x-label for="nombre">Nombre</x-label>
                    <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="nombre"  value="{{$paciente-> nombre}}"required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="apellidos">Apellidos</x-label>
                    <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="apellidos"  value="{{$paciente-> apellidos}}"required autofocus />
                </div>
                <div class="mt-4">
                    <x-label for="edad">Edad</x-label>
                    <input type="number" readonly disabled class="block mt-1 w-full" name="edad" value="{{$paciente-> edad}}"required autofocus min="0">
                </div>        
                <div class="mt-4">
                    <x-label for="sexo">Sexo</x-label>
                    <select readonly disabled class="block mt-1 w-full" name="sexo" id="sexo">
                        <option value="mujer" {{($paciente->sexo == 'mujer')? 'selected': ''}}>Mujer</option>
                        <option value="hombre" {{($paciente->sexo == 'hombre')? 'selected': ''}}>Hombre</option>
                    </select>
                </div>
                <div class="mt-4">
                    <x-label for="estado">Estado</x-label>
                    <select readonly disabled class="block mt-1 w-full" name="estado" id="estado">
                        <option value="vivo" {{($paciente->estado == 'vivo')? 'selected': ''}}>Vivo</option>
                        <option value="muerto"{{($paciente->estado == 'muerto')? 'selected': ''}}>Muerto</option>
                    </select>
                </div>
                <div class="mt-4">
                    <x-label for="fecha_entrada">Fecha entrada</x-label>
                    <input disabled type="datetime-local" name="fecha_entrada" value = "{{$paciente->fecha_entrada->format('Y-m-d\TH:i:s')}}">
                </div>        
                <div class="mt-4">
                    <x-label for="fecha_salida">Fecha salida</x-label>
                    <input disabled type="datetime-local" name="fecha_entrada" value = "{{$paciente->fecha_salida->format('Y-m-d\TH:i:s')}}" >
                </div>
                <div class="mt-4">
                    <x-label for="estado_inicial">Estado inicial</x-label>
                    <select readonly disabled name="estado_inicial" id="estado_inicial">                
                        <option value="Grave" {{($paciente->estado_inicial == 'Grave')? 'selected' : ''}}>Grave</option>
                        <option value="Agudo"{{($paciente->estado_inicial == 'Agudo')? 'selected' : ''}}>Agudo</option>                
                        <option value="Potencialmente recuperable"{{($paciente->estado_inicial == 'Potencialmente recuperable')? 'selected' : ''}}>Potencialmente recuperable</option>
                    </select>        
                </div>
            </div>
            </div>
        </div>

</div>
        <div class="flex items-center justify-end mt-4">
            <button type="button" class="bg-red-800 hover:bg-red-700">
                <a href={{route('pacientes.index')}}>
                {{ __('Volver al listado') }}
                </a>
            </button>
        </div>

</body>
</html>
</x-app-layout>