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



@if (Auth::user()->tipo_usuario_id == 3)

  
               <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold text-lg px-6 py-4 bg-white border-b border-gray-200">
                    Añadir consulta
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <form method="POST" action="{{ route('enfermeros.attachPaciente', $enfermero->id) }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="paciente_id" :value="__('Paciente')" />


                            <select id="paciente_id" name="paciente_id" required>
                                <option value="" selected>{{__('Elige un paciente')}}</option>
                                @foreach ($pacientes as $paciente)
                                
                                <option value="{{$paciente->id}}"  >{{$paciente->nombre}} </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="inicio" :value="__('Inicio de la consulta')" />

                            <x-input id="inicio" class="block mt-1 w-full"
                                     type="datetime-local"
                                     name="inicio"
                                     :value="old('inicio')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="fin" :value="__('Fin de la consulta')" />

                            <x-input id="fin" class="block mt-1 w-full"
                                     type="datetime-local"
                                     name="fin"
                                     :value="old('fin')"
                                     required />
                        </div>

                        <div class="mt-4">
                            <x-label for="estado" :value="__('Estado')" />


                            <select id="estado" name="estado" required>
                                <option value="">{{__('Elige una opción')}}</option>                
                                <option value="Empeoramiento" >Empeoramiento</option>
                                <option value="Continua estable" >Continua estable</option>
                                <option value="Mejorando">Mejorando</option>
                                <option value="Crítico" >Crítico</option>
                                <option value="Recuperado" >Recuperado</option>
                                <option value="En tratamiento">En tratamiento</option>                               
                            </select>
                        </div>

                        <div>
                            <x-label for="notas" :value="__('Notas')" />

                            <x-input id="notas" class="block mt-1 w-full" type="text" name="notas" :value="old('notas')" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                        <form action="{{route('enfermeros.show', $id)}}" method="GET">
                            @csrf
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">Guardar cambios</button>
                        </form>
                        <form action="{{route('pacientes.index')}}" method="GET">
                            @csrf
                            <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                            <button type="submit" class="btn btn-danger btn-sm"style="margin-left: 10px">Cancelar</button>
                        </form>
                    </form>
                    
                        </div>   
                </div>
            </div>
        </div>
    </div>   
              
        @endif



        
       

 

       
        
    

</body>
</html>
</x-app-layout>