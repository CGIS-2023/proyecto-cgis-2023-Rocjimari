<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<br> 
@include('layouts.navigationConsulta')


<div style="  position: relative; margin: 32px 40px;; padding: 60px 20px 16px;  border:2px solid #65e221; ;  border-radius: 10px;  background: #ffffff">
    <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #57d116;  border-radius: 5px;  background: #bcff3fc3;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
    Enfermero: {{$enfermero->apellidos}},  {{$enfermero->nombre}}
    </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    
                    <div class="py-12">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="nombre" 
                        value="{{$enfermero-> nombre}}"required autofocus />
                    </div>
                    <div class="py-12">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control"  readonly disabled class="block mt-1 w-full" name="apellidos" 
                        value="{{$enfermero-> apellidos}}"required autofocus />
                    </div>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($paciente->enfermero as $enfermero)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$enfermero->pivot->inicio->format('d/m/Y')}} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$enfermero->pivot->fin->format('d/m/Y')}} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$enfermero->pivot->estado}} </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$enfermero->pivot->notas}} </span>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach

                        </tbody>
                </div>
                </div>
        </div>


       
        <br>
        <div class="flex items-center justify-end mt-4">
            <button type="button" class="bg-red-800 hover:bg-red-700">
                <a href={{route('enfermeros.index')}}>
                {{ __('Volver al listado') }}
                </a>
            </button>
        </div>
    

</body>
</html>
</x-app-layout>