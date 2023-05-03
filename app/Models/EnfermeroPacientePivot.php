<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PacienteEnfermeroPivot extends Pivot
{
    protected $casts = [
        'inicio' => 'datetime:Y-m-d',
        'fin' => 'datetime:Y-m-d',
    ];
}
