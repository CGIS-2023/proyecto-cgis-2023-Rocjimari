<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            [
               'nombre' => "Juan",
               'apellidos' => 'Arias Caro' ,
               'user_id' => 2,

           ],
           [
            'nombre' => "María del Carmen",
            'apellidos' => 'Ortiz Ramos' ,
            'user_id' => 3,

          ],
        ]);
    }
}
