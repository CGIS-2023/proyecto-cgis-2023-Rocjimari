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
               'estado_inicial' => 'Potencialmente recuperable'

           ],
           [
            'nombre' => "Isabel", 
            'apellidos' => 'Velázquez Dominguez',               
            'sexo' => 'Mujer',
            'edad' => 67,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Vivo',
            'estado_salud_inicial' => 'Agudo'

            ],
            [
            'nombre' => "Marisol",   
            'apellido' => 'Campos Trigos',            
            'sexo' => 'Mujer',
            'edad' => 34,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Muerto',
            'estado_salud_inicial' => 'Grave'

            ],
            [
            'nombre' => "Antonio",
            'apellidos' => "Cuevas Carrión",                
            'sexo' => 'Hombre',
            'edad' => 56,
            'fecha_entrada' => '2021-05-30 10:15:00',               
            'fecha_salida' => '2021-05-30 10:15:00',
            'estado' => 'Muerto',
            'estado_salud_inicial' => 'Potencialmente recuperable'
    
                ],
        ]);
    }
}
