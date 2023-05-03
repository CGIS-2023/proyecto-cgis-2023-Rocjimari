<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PacienteEnfermeroPivot extends Pivot
{
    protected $casts = [
        'inicio' => 'datetime:Y-m-d H:i:s',
        'fin' => 'datetime:Y-m-d H:i:s',
    ];
}
