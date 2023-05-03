<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enfermero extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre',
        'apellidos',
    ]; 
    
    public function pacientes(){
        return $this->belongsToMany(Paciente::class)->using(PacienteEnfermeroPivot::class)->withPivot('inicio','fin','notas','estado');
    }
    // public function pacientes(){
    //     return $this->hasMany(Paciente::class);
    // }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
