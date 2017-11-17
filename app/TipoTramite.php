<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    protected $table = 'tipos_tramite';

    protected $fillable = ['nombre', 'descripcion'];
}
