<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: auto;
            padding: 50px;
        }
        table, td, th {
            border: 1px solid black;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th {
            height: 70px;
        }
        td {
            height: 30px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>
    </head>
    <body>
    <h2>Listado Pacientes</h2>
    <!-- <form methos="POST" action="/pacientes/crear"></form> -->
    <table> 
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Sexo</th>
            <th>Edad</th>
            <th>Estado</th>
            <th>Fecha entrada</th>
            <th>Fecha salida</th>
            <th>Estado inicial</th>
        </tr>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->nombre }}</td>
                <td>{{ $paciente->apellidos }}</td>
                <td>{{ $paciente->sexo }}</td>
                <td>{{ $paciente->edad }}</td>
                <td>{{ $paciente->estado }}</td>
                <td>{{ $paciente->fecha_entrada }}</td>
                <td>{{ $paciente->fecha_salida }}</td>
                <td>{{ $paciente->estado_inicial }}</td>
                <td>
                    <form action="/pacientes/{{$paciente->id}}">
                        @csrf
                        @method('edit')
                    <button type="submit" class="flex items-center justify-end mt-4">Ver</button>
                    <br></form>

                    <form action="/pacientes/{{$paciente->id}}/edit">
                        @csrf
                        @method('edit')
                    <button type="submit" class="flex items-center justify-end mt-4">Editar</button>
                    </form>

                    </form>
                    <form action="/pacientes/{{$paciente->id}}" method="POST" onsubmit="return confirm('¿Do you want to delete this?')">
                        @csrf
                        @method('delete')
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                            <script>
                                 $(".specialButton").click(function(){
                                    return confirm("Do you want to delete this ?");
                                });
                            </script>
                        <button type="submit" class="flex items-center justify-end mt-4">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table> 
    <br>
    <a href="/pacientes/create">Nuevo paciente</a>
    </body>
</html>