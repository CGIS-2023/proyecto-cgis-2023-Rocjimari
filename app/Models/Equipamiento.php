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
        // 'localizacion',
    ];
    public function paciente(){
        return $this->belongTo(Equipamiento::class);
    }
}
