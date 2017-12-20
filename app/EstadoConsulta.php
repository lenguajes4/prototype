<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoConsulta extends Model
{
    protected $table = 'estados_consulta';
    protected $fillable = ['nombre', 'codigo', 'descripcion'];
}
