<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
    public function up(): void
    {
        Schema::create('pacientes', function(Blueprint $table){
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('sexo');
            $table->integer('edad');
            $table->string('estado');
            $table->datetime('fecha_entrada');
            $table->datetime('fecha_salida');            
            $table->string('estado_inicial');
            $table->foreignId('enfermero_id')->nullable();
            $table->foreignId('medico_id')->nullable();

            $table->id();
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
