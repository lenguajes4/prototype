<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Profip\Traits\DatesTraslator;

class Consulta extends Model
{
    use DatesTraslator;

    protected $table = 'consultas';
    protected $fillable = [
        'informe_id', 'registro_id', 'estado_consulta_id', 'consulta', 'respuesta', 'path'
    ];

    public function registro()
    {
        return $this->belongsTo(\App\Registro::class, 'registro_id');
    }

    public function informe()
    {
        return $this->belongsTo(\App\Informe::class, 'informe_id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\EstadoConsulta::class, 'estado_consulta_id');
    }

    public function scopeEstado($query, $estado)
    {
        if ($estado) {
            return $query->where('estado_consulta_id', $estado);
        }
        return $query;
    }

    public function pendientes()
    {
        return $this->where('estado_consulta_id', 1);
    }
}
