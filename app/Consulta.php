<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Profip\Traits\DatesTraslator;

class Consulta extends Model
{
    use DatesTraslator;

    protected $table = 'consultas';
    protected $fillable = [
        'informe_id', 'registro_id', 'usuario_asistente_id', 'consulta', 'respuesta', 'path'
    ];

    public function registro()
    {
        return $this->belongsTo(\App\Registro::class, 'registro_id');
    }

    public function informe()
    {
        return $this->belongsTo(\App\Informe::class, 'informe_id');
    }

    public function asistente()
    {
        return $this->belongsTo(\App\User::class, 'usuario_asistente_id');

    }

    public function getEstadoAttribute()
    {
        if ($this->respuesta) {
            return 'respondida';
        }
        return 'pendiente';
    }
}
