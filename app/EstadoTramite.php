<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoTramite extends Model
{
    protected $table = 'estados_tramite';

    protected $fillable = [
        'nombre', 'codigo', 'descripcion'
    ];
}
