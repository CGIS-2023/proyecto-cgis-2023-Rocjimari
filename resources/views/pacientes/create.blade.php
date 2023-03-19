<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Añadir Paciente</h1>

    <form action="/pacientes" method="POST" role="form">
        {{ csrf_field()}}
        <div class="py-12">
            <label for="name">Nombre</label>
            <input type="text" class="form-control"  name="nombre" id="Escribe nombre paciente">
        </div>

        <div class="py-12">
            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" min="0">
        </div>        
        <div class="py-12">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo">
                <option value="" disabled selected>{{'Elige una opción'}}</option>
                <option value="mujer">Mujer</option>
                <option value="hombre">Hombre</option>
            </select>
        </div>
        <div class="py-12">
            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="" disabled selected>{{'Elige una opción'}}</option>
                <option value="vivo">Vivo</option>
                <option value="muerto">Muerto</option>
            </select>
        </div>
        <div class="py-12">
            <label for="fecha_entrada">Fecha entrada</label>
            <input type="datetime-local" name="fecha_entrada" >
        </div>
        
        <div class="py-12">
            <label for="fecha_salida">Fecha salida</label>
            <input type="datetime-local" name="fecha_salida" >
        </div>

        <div class="py-12">
            <label for="estado_inicial">Estado inicial</label>
            <select name="estado_inicial" id="estado_inicial">                
                <option value="" disabled selected>{{'Elige una opción'}}</option>
                <option value="Grave">Grave</option>
                <option value="Agudo">Agudo</option>                
                <option value="Potencialmente recuperable">Potencialmente recuperable</option>
            </select>
            
        </div>
        <br>
        <input type="submit" value="Crear paciente">
        
    </form>
</body>
</html>