<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnfermeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('enfermeros')->insert([
        [
            'nombre' => "Juani",
            'apellidos' => 'Durán Sal' ,
            'user_id' => 4,

        ],
        [
         'nombre' => "Bernardo",
         'apellidos' => 'Gómez Saucedo' ,
         'user_id' => 5,

       ],
    ]);
    }
}
