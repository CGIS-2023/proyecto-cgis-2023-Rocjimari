<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamiento extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'tipo',
        'equipamiento_id'
        // 'localizacion',
    ];
    public function paciente(){
        return $this->belongTo(Equipamiento::class);
    }
    public function obtenerEquipamientoPorPaciente($paciente_id)
    {
        return $this->where('paciente_id', $paciente_id)->get();
    }
}
