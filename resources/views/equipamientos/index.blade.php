<x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('csss/app.css')}}">
</head>
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
    <br>
    <div class="card">
        <div class="card-header">
            Equipamiento Médico
        </div>
        <div class="card-body">
        <table >
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Localizacion</th>
        </thead>
        <tbody>
        @foreach($equipamientos as $equipamiento)
            <tr>
                <td>{{ $equipamiento->nombre }}</td>
                <td>{{ $equipamiento->tipo }}</td>
                <td>{{ $equipamiento->localizacion }}
                <td>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                   
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 10px">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer text-muted">
        <br>
        <a href="/pacientes/create">Nuevo Equipamientos</a>
        <br>
        <a href="/">Inicio</a>
    </div>
        </div>
    </div>
    
    
    
    </body>
</html>
</x-app-layout>