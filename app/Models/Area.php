<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area_UCI extends Model
{
    use HasFactory;
    protected $fillable =[
        'tipo',
        'numero_camas',
        'ubicacion',
    ];
    protected $casts =[
        'numero_camas' => 'integer',
    ];
    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
