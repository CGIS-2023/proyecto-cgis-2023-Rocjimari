<?php

namespace App\Models;

use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Enfermero;
use App\Models\Administrativo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function medico(){
        return $this->hasOne(Medico::class);
    }

    public function administrativo(){
        return $this->hasOne(Administrativo::class);
    }

    public function enfermero(){
        return $this->hasOne(Enfermero::class);
    }


    public function getTipoUsuarioIdAttribute(){
        if ($this->medico()->exists()){
            return 2;
        }
        elseif($this->administrativo()->exists()){
            return 1;
        } 
        elseif($this->enfermero()->exists()){
            return 3;
        }
        else{
            return 4;
        }
    }
    public function getTipoUsuarioAttribute(){
        $tipos_usuario = [1 => trans('Administrativo'), 2 => trans('Médico'), 3 => trans('Enfermero'), 4 => trans('Administrador') ];
        return $tipos_usuario[$this->tipo_usuario_id];
    }
}
