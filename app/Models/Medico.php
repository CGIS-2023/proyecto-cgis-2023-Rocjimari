<?php

namespace App\Models;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellidos',
        
    ];
    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
