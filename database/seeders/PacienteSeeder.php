<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            [
               'nombre' => "Juan",
               'apellidos' => 'López Tolosa' ,               
               'sexo' => 'Hombre',
               'edad' => 24,
               'fecha_entrada' => '2021-05-30 10:15:00',               
               'fecha_salida' => '2021-05-30 10:15:00',
               'estado' => 'Vivo',
               'estado_inicial' => 'Potencialmente recuperable',
               'medico_id' => 2,
               'enfermero_id' => 2,

           ],
           [
            'nombre' => "Isabel", 
            'apellidos' => 'Velázquez Dominguez',               
            'sexo' => 'Mujer',
            'edad' => 67,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Vivo',
            'estado_salud_inicial' => 'Agudo',
            'medico_id' => 1,            
            'enfermero_id' => 2,


            ],
            [
            'nombre' => "Marisol",   
            'apellido' => 'Campos Trigos',            
            'sexo' => 'Mujer',
            'edad' => 34,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Muerto',
            'estado_salud_inicial' => 'Grave',
            'medico_id' => 2,            
            'enfermero_id' => 2,
            


            ],
            [
            'nombre' => "Antonio",
            'apellidos' => "Cuevas Carrión",                
            'sexo' => 'Hombre',
            'edad' => 56,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Muerto',
            'estado_salud_inicial' => 'Potencialmente recuperable',
            'medico_id' => 2,
            'enfermero_id' => 2,

                ],
            [
            'nombre' => "Paula",   
            'apellido' => 'Pérez Castro',            
            'sexo' => 'Mujer',
            'edad' => 34,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Vivo',
            'estado_salud_inicial' => 'Agudo',
            'medico_id' => 1,            
            'enfermero_id' => 1,
            


            ],
        ]);
        
            DB::table('enfermero_paciente')->insert([
            [
                'paciente_id' => 1,
                'enfermero_id' => 2,
                'inicio' => '2021-05-31 10:15:00',
                'fin' => '2021-06-07 12:15:00',
                'estado' => "Empeoramiento",
                'notas' => 'El paciente sufrío una parada cardiaca ',
            ],
            [
                'paciente_id' => 5,
                'enfermero_id' => 1,
                'inicio' => '2021-05-31 10:15:00',
                'fin' => '2021-06-07 12:15:00',
                'estado' => "Empeoramiento",
                'notas' => 'El paciente sufrío una parada cardiaca ',
            ],
            [
                'paciente_id' => 2,
                'enfermero_id' => 2,
                'inicio' => '2021-05-31 15:01:00',
                'fin' => '2021-06-07 10:15:00',
                'estado' => "Continua estable",
                'notas' => 'El paciente continua estable ',
            ],
            [
                'paciente_id' => 2,
                'enfermero_id' => 2,
                'inicio' => '2021-05-31 10:01:00',
                'fin' => '2021-06-07 10:15:00',
                'estado' => "Empeoramiento",
                'notas' => 'El paciente tuvo una reacción alérgica a la amoxicilina ',
            ],
            [
                'paciente_id' => 2,
                'enfermero_id' => 1,
                'inicio' => '2021-05-31 16:15:00',
                'fin' => '2021-06-07 16:30:00',
                'estado' => "En tratamiento",
                'notas' => 'El paciente mejora progresivamente ',
            ],
        ]);
    }
}
