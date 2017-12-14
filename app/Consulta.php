<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $fillable = ['informe_id', 'consulta', 'respuesta', 'visto', 'path'];
}
