<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informes';

    protected $fillable = [
        'estado_tramite_id', 'tipo_tramite_id', 'vehiculo_id', 'usuario_id',
        'numero_tramite', 'observaciones'
    ];
}
