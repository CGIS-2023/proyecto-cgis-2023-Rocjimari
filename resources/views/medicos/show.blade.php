<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion Medico</title>
</head>
<body>
Información Médico
<br> 
Medico: {{$medico->nombre}}

<div>
    <br>
        <div class="py-12">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="nombre" 
             value="{{$medico-> nombre}}"required autofocus />
        </div>
        <div class="py-12">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="apellidos" 
             value="{{$medico-> apellidos}}"required autofocus />
        </div>

       
        <br>
        <div class="flex items-center justify-end mt-4">
            <button type="button" class="bg-red-800 hover:bg-red-700">
                <a href={{route('medicos.index')}}>
                {{ __('Volver al listado') }}
                </a>
            </button>
        </div>

</body>
</html>