<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Paciente</title>
</head>
<body>
Información Paciente
<br> 
Paciente: {{$paciente->nombre}}

<div>
    <br>
        <div class="py-12">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="nombre"  value="{{$paciente-> nombre}}"required autofocus />
        </div>
        <div class="py-12">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="apellidos"  value="{{$paciente-> apellidos}}"required autofocus />
        </div>

        <div class="py-12">
            <label for="edad">Edad</label>
            <input type="number" readonly disabled class="block mt-1 w-full" name="edad" value="{{$paciente-> edad}}"required autofocus min="0">
        </div>        
        <div class="py-12">
            <label for="sexo">Sexo</label>
            <select readonly disabled class="block mt-1 w-full" name="sexo" id="sexo">
                <option value="mujer" {{($paciente->sexo == 'mujer')? 'selected': ''}}>Mujer</option>
                <option value="hombre" {{($paciente->sexo == 'hombre')? 'selected': ''}}>Hombre</option>
            </select>
        </div>
        <div class="py-12">
            <label for="estado">Estado</label>
            <select readonly disabled class="block mt-1 w-full" name="estado" id="estado">
                <option value="vivo" {{($paciente->estado == 'vivo')? 'selected': ''}}>Vivo</option>
                <option value="muerto"{{($paciente->estado == 'muerto')? 'selected': ''}}>Muerto</option>
            </select>
            
        </div>
        </div>
        <div class="py-12">
            <label for="fecha_entrada">Fecha entrada</label>
            <input disabled type="datetime-local" name="fecha_entrada" value = "{{$paciente->fecha_entrada->format('Y-m-d\TH:i:s')}}">
        </div>
        
        <div class="py-12">
            <label for="fecha_salida">Fecha salida</label>
            <input disabled type="datetime-local" name="fecha_entrada" value = "{{$paciente->fecha_salida->format('Y-m-d\TH:i:s')}}" >
        </div>

        <div class="py-12">
            <label for="estado_inicial">Estado inicial</label>
            <select readonly disabled name="estado_inicial" id="estado_inicial">                
                <option value="Grave" {{($paciente->estado_inicial == 'Grave')? 'selected' : ''}}>Grave</option>
                <option value="Agudo"{{($paciente->estado_inicial == 'Agudo')? 'selected' : ''}}>Agudo</option>                
                <option value="Potencialmente recuperable"{{($paciente->estado_inicial == 'Potencialmente recuperable')? 'selected' : ''}}>Potencialmente recuperable</option>
            </select>
        
        </div>
        <br>
        <div class="flex items-center justify-end mt-4">
            <button type="button" class="bg-red-800 hover:bg-red-700">
                <a href={{route('pacientes.index')}}>
                {{ __('Volver al listado') }}
                </a>
            </button>
        </div>

</body>
</html>