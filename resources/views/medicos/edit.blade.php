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

</head>
<body>
 @include('layouts.navigationsecondary')
        

       <div style="  position: relative; margin: 32px 16px;; padding: 60px 20px 16px;  border:2px solid #dad4ff; ;  border-radius: 10px;  background: #ffffff">
        <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #7f71d3;  border-radius: 5px;  background: #a59cd8a5;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
            Medico: {{ $medico->apellidos }}, {{ $medico->nombre }}
            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                            
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
                            </div>
        </div>

</body>
</html>
</x-app-layout>