<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermero extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'especialidad',
    ]; 
    
    public function pacientes(){
        return $this->belongsToMany(Paciente::class)->withPivot('inicio','fin','notas','estado');
    }
}