@props(['enfermeros'])

@if (Auth::user()->tipo_usuario_id == 3){

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($enfermero->pacientes as $paciente)
                <tr>
                
                <td class="py-3 px-6 text-center whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{$paciente->pivot->inicio->format('d/m/Y')}} </span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{$paciente->pivot->fin->format('d/m/Y')}} </span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{$paciente->pivot->estado}} </span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{$paciente->pivot->notas}} </span>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>

                </div>
                </div>
        </div>ç
}
@endif