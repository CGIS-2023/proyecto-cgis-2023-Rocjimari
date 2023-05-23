<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enfermedades')->insert([
            [
                'nombre' => "Asma",
                'tipo' => 'Pulmonar' ,
                'clasificacion' => 'Crónica',
                'origen' => 'No infecciosa' ,
                'frecuencia' => 'Epidémica',
    
            ],
        ]);
    }
}
