<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EquipamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipamientos')->insert([
            [
                'nombre' => "Monitor cardiorespiratorio",
                'tipo' => 'Dispositivo de monitoreo' , 
                'paciente_id' => 2
            ],
            [
                'nombre' => "Respirador",
                'tipo' => 'Aparato complejo' ,  
                'paciente_id' => 2             
                // 'localizacion' => 'Almacén',
            ],
            [
                'nombre' => "Sonda pleural",
                'tipo' => 'Aparato complejo' ,   
                'paciente_id' => 1            
                // 'localizacion' => 'Almacén',
            ],
        ]);
    }
}
