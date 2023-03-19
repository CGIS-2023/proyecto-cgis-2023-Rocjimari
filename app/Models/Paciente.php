<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable =  [
        'nombre',
        'apellidos',
        'sexo',
        'edad',
        'estado',
        'estado_inicial',
        'fecha_entrada',
        'fecha_salida',

    ];

    protected $hidden =[
        'id'
    ];

    protected $casts = [
        'edad' => 'integer',
        'fecha_entrada' => 'datetime:Y-m-d H:i:s',
        'fecha_salida' => 'datetime:Y-m-d H:i:s',
    ];
    
    // //Listado de los pacientes de la tabla
    // public function ObtenerPacientes(){
    //     return Paciente::all();
    // }
    // //Listado de los pacientes de la tabla por Id
    // public function ObtenerPacientesPorId($id){
    //     return Paciente::find($id);
    // }

/////////////////////////////////////////////////////


    public function cama(){
        return $this->hasOne(Cama::class);
    }

    public function equipamientos(){
        return $this->hasMany(Equipamiento::class);
    }

    public function Area_UCI(){
        return $this->belongTo(Area_UCI::class);
    }
    
    public function enfermeros(){
        return $this->belongsToMany(Enfermero::class)->withPivot('inicio','fin','notas','estado');
    }

    public function enfermedads(){
        return $this->belongsToMany(Enfermedad::class)->withPivot('fecha_deteccion_enfermedad');
    }
    



}