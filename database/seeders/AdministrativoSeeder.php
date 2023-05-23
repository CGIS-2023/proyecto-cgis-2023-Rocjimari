<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdministrativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrativos')->insert([
            [
               'nombre' => "María Ángeles",
               'apellidos' => 'Tomás Portillo' ,
               'user_id' => 6,

           ],
        ]);
    }
}
