<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermero extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'apellidos',
    ]; 
    
    // public function pacientes(){
    //     return $this->belongsTo(Paciente::class);

    //     // return $this->belongsToMany(Paciente::class)->withPivot('inicio','fin','notas','estado');
    // }
    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
