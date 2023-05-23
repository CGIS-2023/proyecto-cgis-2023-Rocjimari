<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="path/to/custom-styles.css">

</head>
<body>
<div style="  position: relative; margin: 32px 100px;; padding: 60px 20px 16px;  border:2px solid #dad4ff; ;  border-radius: 10px;  background: #ffffff">
    <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #7f71d3;  border-radius: 5px;  background: #a59cd8a5;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
    Enfermero a añadir 
    </div>
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <form  action="{{ route('enfermeros.store') }}" method="POST" role="form">
                    {{ csrf_field()}}
                    <div class="mt-4">
                    <input type="hidden" name="user_id" value="3">

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
                    <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">Crear enfermero</button>
                    </div> 
                    
                </form>
                </div>
            </div>
        </div>
</body>
</html>
</x-app-layout>