<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermero_paciente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->text('notas')->nullable();
            $table->date('inicio');
            $table->date('fin');            
            $table->string('estado');
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->foreignId('enfermero_id')->constraine;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente_enfermero');
    }
};
