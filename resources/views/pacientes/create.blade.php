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
<div style="  position: relative; margin: 32px 100px;; padding: 60px 20px 16px;  border:2px solid #dad4ff; ;  border-radius: 10px;  background: #ffffff">
    <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #7f71d3;  border-radius: 5px;  background: #a59cd8a5;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
    Paciente a añadir 
    </div>



@if (Auth::user()->tipo_usuario_id == 2)
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <form  action="{{ route('pacientes.store') }}" method="POST" role="form">
                    {{ csrf_field()}}
                    <div class="mt-4">
                    <x-label for="medico_id" :value="__('Medico')" />
                        <select id="medico_id" name="medico_id" required>                
                            <option value="{{$medico->id}}"  selected >{{$medico->nombre}} </option>
                        </select>
                    </div>
                    <div class="mt-4">
                    <x-label for="enfermero_id" :value="__('Enfermero')" />
                        <select id="enfermero_id" name="enfermero_id" required> 
                            <option value="" @if (old('enfermero_id') == '') selected @endif>Seleccionar Enfermero</option>                            
                            @foreach ($enfermeros as $enfermero)
                            <option value="{{$enfermero->id}}" >{{$enfermero->nombre}} </option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="mt-4">
                        <x-label required for="name">Nombre</x-label>
                        <input type="text" class="form-control"  name="nombre" id="Escribe nombre paciente" placeholder="Escribe nombre paciente">
                    </div>
                    <div class="mt-4">
                        <x-label required for="apellidos">Apellidos</x-label>
                        <input type="text" class="form-control"  name="apellidos" id="Escribe apellidos paciente" placeholder="Escribe apellidos paciente">
                    </div>

                    <div class="mt-4">
                        <x-label for="edad">Edad</x-label>
                        <input type="number" name="edad" id="edad" min="0" placeholder="Escribe edad paciente">
                    </div>        
                    <div class="mt-4">
                        <x-label for="sexo">Sexo</x-label>
                        <select name="sexo" id="sexo">
                            <option value="" disabled selected>{{'Elige una opción'}}</option>
                            <option value="mujer">Mujer</option>
                            <option value="hombre">Hombre</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="estado">Estado</x-label>
                        <select name="estado" id="estado">
                            <option value="" disabled selected>{{'Elige una opción'}}</option>
                            <option value="vivo">Vivo</option>
                            <option value="muerto">Muerto</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="fecha_entrada">Fecha entrada</x-label>
                        <input required type="datetime-local" name="fecha_entrada" >
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="fecha_salida">Fecha salida</x-label>
                        <input required type="datetime-local" name="fecha_salida" >
                    </div>

                    <div class="mt-4">
                        <x-label for="estado_inicial">Estado inicial</x-label>
                        <select name="estado_inicial" id="estado_inicial" required>                
                            <option value="" disabled selected>{{'Elige una opción'}}</option>
                            <option value="Grave">Grave</option>
                            <option value="Agudo">Agudo</option>                
                            <option value="Potencialmente recuperable">Potencialmente recuperable</option>
                        </select>
                        
                    </div>
                    </div>
            </div>
        </div>
                    <br>
                    <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">Crear paciente</button>
                    </div>  
                    
                </form>
                @endif
                
@if (Auth::user()->tipo_usuario_id == 3)
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <form  action="{{ route('pacientes.store') }}" method="POST" role="form">
                    {{ csrf_field()}}
                    <div class="mt-4">
                    <x-label for="medico_id" :value="__('Medico')" />
                        <select id="medico_id" name="medico_id" required>  
                        <option value="" @if (old('medico_id') == '') selected @endif>Seleccionar Médico</option>                            

                        @foreach ($medicos as $medico)                                      
                            <option value="{{$medico->id}}"   >{{$medico->nombre}} </option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="mt-4">
                    <x-label for="enfermero_id" :value="__('Enfermero')" />
                        <select id="enfermero_id" name="enfermero_id" required> 
                                <option value="{{$enfermero->id}}" >{{$enfermero->nombre}} </option>
                       </select>
                    </div>   
                    <div class="mt-4">
                        <x-label required for="name">Nombre</x-label>
                        <input type="text" class="form-control"  name="nombre" id="Escribe nombre paciente" placeholder="Escribe nombre paciente">
                    </div>
                    <div class="mt-4">
                        <x-label required for="apellidos">Apellidos</x-label>
                        <input type="text" class="form-control"  name="apellidos" id="Escribe apellidos paciente" placeholder="Escribe apellidos paciente">
                    </div>

                    <div class="mt-4">
                        <x-label for="edad">Edad</x-label>
                        <input type="number" name="edad" id="edad" min="0" placeholder="Escribe edad paciente">
                    </div>        
                    <div class="mt-4">
                        <x-label for="sexo">Sexo</x-label>
                        <select name="sexo" id="sexo">
                            <option value="" disabled selected>{{'Elige una opción'}}</option>
                            <option value="mujer">Mujer</option>
                            <option value="hombre">Hombre</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="estado">Estado</x-label>
                        <select name="estado" id="estado">
                            <option value="" disabled selected>{{'Elige una opción'}}</option>
                            <option value="vivo">Vivo</option>
                            <option value="muerto">Muerto</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <x-label for="fecha_entrada">Fecha entrada</x-label>
                        <input required type="datetime-local" name="fecha_entrada" >
                    </div>
                    
                    <div class="mt-4">
                        <x-label for="fecha_salida">Fecha salida</x-label>
                        <input required type="datetime-local" name="fecha_salida" >
                    </div>

                    <div class="mt-4">
                        <x-label for="estado_inicial">Estado inicial</x-label>
                        <select name="estado_inicial" id="estado_inicial" required>                
                            <option value="" disabled selected>{{'Elige una opción'}}</option>
                            <option value="Grave">Grave</option>
                            <option value="Agudo">Agudo</option>                
                            <option value="Potencialmente recuperable">Potencialmente recuperable</option>
                        </select>
                        
                    </div>
                    </div>
            </div>
        </div>
                    <br>
                    <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">Crear paciente</button>
                    </div>  
                    
                </form>
                @endif
</body>
</html>
</x-app-layout>