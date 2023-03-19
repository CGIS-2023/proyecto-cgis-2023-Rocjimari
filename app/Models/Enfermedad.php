<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'tipo',
        'clasificacion',
        'origen',
        'frecuencia',
    ];
    public function pacientes(){
        return $this->belongsToMany(Paciente::class)->withPivot('fecha_deteccion_enfermedad');
    }
}
