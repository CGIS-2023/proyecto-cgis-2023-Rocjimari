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
        
        <br>

       <div style="  position: relative; margin: 32px 16px;; padding: 60px 20px 16px;  border:2px solid #dad4ff; ;  border-radius: 10px;  background: #ffffff">
        <div style="position: absolute; top: 16px;   left: 50px;  line-height: 32px;  padding-left: 275px;  padding-right: 275px;  border: 2px solid #7f71d3;  border-radius: 5px;  background: #a59cd8a5;  font-weight: bold;  font-size: 17px;  text-align: center; font-family: sans-serif ">
            Paciente: {{ $paciente->apellidos }}, {{ $paciente->nombre }}
            </div>


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" role="form">
                                @csrf
                                @method('put')
                                <br>
                                <div class="mt-4">
                                    <x-label for="nombre">Nombre</x-label>
                                    <input type="text" name="nombre" value="{{ $paciente->nombre }}">
                                </div>
                                <div class="mt-4">
                                    <x-label for="apellidos">Apellidos</x-label>
                                    <input type="text" name="apellidos" value="{{ $paciente->apellidos }}">
                                </div>

                                <div class="mt-4">
                                    <x-label for="edad">Edad</x-label>
                                    <input type="number" name="edad" id="edad" min="0" value="{{ $paciente->edad }}">
                                </div>
                                <div class="mt-4">
                                    <x-label for="sexo">Sexo</x-label>
                                    <select name="sexo" id="sexo">
                                        <option value="Mujer" {{ $paciente->sexo == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                                        <option value="Hombre" {{ $paciente->sexo == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <x-label for="estado">Estado</x-label>
                                    <select name="estado" id="estado">
                                        <option value="vivo" {{ $paciente->estado == 'vivo' ? 'selected' : '' }}>Vivo</option>
                                        <option value="muerto" {{ $paciente->estado == 'muerto' ? 'selected' : '' }}>Muerto</option>
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <x-label for="fecha_entrada">Fecha entrada</x-label>
                                    <input type="datetime-local" name="fecha_entrada" value="{{ $paciente->fecha_entrada->format('Y-m-d\TH:i:s') }}">
                                </div>
                                <div class="mt-4">
                                    <x-label for="fecha_salida">Fecha salida</x-label>
                                    <input type="datetime-local" name="fecha_salida" value="{{ $paciente->fecha_salida->format('Y-m-d\TH:i:s') }}">
                                </div>
                                <div class="mt-4">
                                    <x-label for="estado_inicial">Estado inicial</x-label>
                                    <select name="estado_inicial" id="estado_inicial">
                                        <option value="Grave" {{ $paciente->estado_inicial == 'Grave' ? 'selected' : '' }}>Grave</option>
                                        <option value="Agudo" {{ $paciente->estado_inicial == 'Agudo' ? 'selected' : '' }}>Agudo</option>
                                        <option value="Potencialmente recuperable" {{ $paciente->estado_inicial == 'Potencialmente recuperable' ? 'selected' : '' }}>Potencialmente recuperable</option>
                                    </select>
                                 </div>
                                 <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-success btn-sm" style="margin-left: 10px">Editar</button>
                                </div>   
                                
                            
                            
                       
                        </form>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>
