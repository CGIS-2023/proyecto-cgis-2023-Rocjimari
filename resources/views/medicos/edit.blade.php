<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medico {{$medico-> nombre}}</title>
</head>
<body>
Editar Medico: {{$medico-> nombre}}
<br>
<form action="{{route('medicos.update', $medico->id)}}" method="POST" role="form">
        {{ csrf_field()}} 
        @method('put')
        <br>
        <div class="py-12">
            <label for="">Nombre</label>
            <input type="text" name="nombre" value="{{$medico-> nombre}}">
        </div>
        <div class="py-12">
            <label for="">Apellidos</label>
            <input type="text" name="apellidos" value="{{$medico-> apellidos}}">
        </div>

        
        <br>
        <button type="submit" class="btn btn-danger btn-sm">Editar</button>
        
    </form>
</body>
</html>