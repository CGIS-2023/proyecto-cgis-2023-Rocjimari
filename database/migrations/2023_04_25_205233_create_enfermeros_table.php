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
        Schema::create('enfermeros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');   
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('paciente_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermeros');
    }
};
