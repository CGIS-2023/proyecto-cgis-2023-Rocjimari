<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Añadir Enfermero</h1>

    <form action="/enfermeros" method="POST" role="form">
        {{ csrf_field()}}
        <div class="py-12">
            <label required for="name">Nombre</label>
            <input type="text" class="form-control"  name="nombre" id="Escribe nombre enfermero" placeholder="Escribe nombre médico">
        </div>
        <div class="py-12">
            <label required for="apellidos">Apellidos</label>
            <input type="text" class="form-control"  name="apellidos" id="Escribe apellidos enfermero" placeholder="Escribe apellidos médico">
        </div>

        
            
        </div>
        <br>
        <input type="submit" value="Crear Enfermero">
        
    </form>
</body>
</html>