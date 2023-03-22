<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente {{$paciente-> nombre}}</title>
</head>
<body>
Editar Paciente: {{$paciente-> nombre}}
<br>
<form action="{{route('pacientes.update', $paciente->id)}}" method="POST" role="form">
        {{ csrf_field()}} 
        @method('put')
        <br>
        <div class="py-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$paciente-> nombre}}">
        </div>
        <div class="py-12">
            <label for="">Apellidos</label>
            <input type="text" name="apellidos" value="{{$paciente-> apellidos}}">
        </div>

        <div class="py-12">
            <label for="">Edad</label>
            <input type="number" name="edad" id="edad" min="0" value="{{$paciente-> edad}}">
        </div>        
        <div class="py-12">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo">
                <option value="Mujer" {{($paciente->sexo == 'Mujer')? 'selected': ''}}>Mujer</option>
                <option value="Hombre" {{($paciente->sexo == 'Hombre')? 'selected': ''}}>Hombre</option>
            </select>
        </div>
        <div class="py-12">
            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="vivo" {{($paciente->estado == 'vivo')? 'selected': ''}}>Vivo</option>
                <option value="muerto"{{($paciente->estado == 'muerto')? 'selected': ''}}>Muerto</option>
            </select>
            
        </div>
        <div class="py-12">
            <label for="fecha_entrada">Fecha entrada</label>
            <input type="datetime-local" name="fecha_entrada" value = "{{$paciente->fecha_entrada->format('Y-m-d\TH:i:s')}}">
        </div>
        
        <div class="py-12">
            <label for="fecha_salida">Fecha salida</label>
            <input type="datetime-local" name="fecha_entrada" value = "{{$paciente->fecha_salida->format('Y-m-d\TH:i:s')}}" >
        </div>

        <div class="py-12">
            <label for="estado_inicial">Estado inicial</label>
            <select name="estado_inicial" id="estado_inicial">                
                <option value="Grave" {{($paciente->estado_inicial == 'Grave')? 'selected' : ''}}>Grave</option>
                <option value="Agudo"{{($paciente->estado_inicial == 'Agudo')? 'selected' : ''}}>Agudo</option>                
                <option value="Potencialmente recuperable"{{($paciente->estado_inicial == 'Potencialmente recuperable')? 'selected' : ''}}>Potencialmente recuperable</option>
            </select>
            
        </div>
        <br>
        <button type="submit" class="btn btn-danger btn-sm">Editar</button>
        
    </form>
</body>
</html>