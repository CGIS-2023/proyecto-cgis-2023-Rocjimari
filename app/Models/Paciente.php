<?php

namespace App\Models;

use App\Models\User;
use App\Models\Medico;
use App\Models\Enfermero;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'medico_id',
        'enfermero_id',

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




    // public function cama(){
    //     return $this->hasOne(Cama::class);
    // }

    public function equipamientos(){
        return $this->hasMany(Equipamiento::class);
    }

    // public function Area_UCI(){
    //     return $this->belongTo(Area_UCI::class);
    // }
 // N-N   
    public function enfermeros(){
        return $this->belongsToMany(Enfermero::class)->withPivot('inicio','fin','notas','estado');
    }

    // public function enfermedads(){
    //     return $this->belongsToMany(Enfermedad::class)->withPivot('fecha_deteccion_enfermedad');
    // }



    public function user(){
        return $this->belongsTo(User::class);
    }

// 1 - N
    public function medicos(){
        return $this->belongsTo(Medico::class);
    }

    // public function enfermeros(){
    //     return $this->belongsTo(Enfermero::class);
    // }
// N-N
    public function administrativos(){
        return $this->belongsTo(Administrativo::class);
    }

}