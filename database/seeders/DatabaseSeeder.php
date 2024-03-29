<?php

namespace Database\Seeders;

use App\Models\Administrativo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class, 
            AdministrativoSeeder::class,
            MedicoSeeder::class,            
            EnfermeroSeeder::class,
            PacienteSeeder::class, 
            EquipamientoSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
