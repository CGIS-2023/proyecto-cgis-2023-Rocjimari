<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Enfermero;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnfermeroPolicy
{
    use HandlesAuthorization;
    public function author (User $user, Paciente $paciente){
        if ( $user->id == $paciente->id ){
            return true;
        }else{
            return false;
        }



    }
    
}

    // /**
    //  * Determine whether the user can view any models.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function viewAny(User $user)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Enfermero  $enfermero
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function view(User $user, Enfermero $enfermero)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can create models.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function create(User $user)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can update the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Enfermero  $enfermero
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function update(User $user, Enfermero $enfermero)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Enfermero  $enfermero
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function delete(User $user, Enfermero $enfermero)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can restore the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Enfermero  $enfermero
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function restore(User $user, Enfermero $enfermero)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Enfermero  $enfermero
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function forceDelete(User $user, Enfermero $enfermero)
    // {
    //     //
    // }

