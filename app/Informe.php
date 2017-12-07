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

    public function vehiculo()
    {
        return $this->belongsTo(\App\Vehiculo::class, 'vehiculo_id');
    }

    public function tramite()
    {
        return $this->belongsTo(\App\TipoTramite::class, 'tipo_tramite_id');
    }

    public function gestor()
    {
        return $this->belongsTo(\App\User::class, 'usuario_id');
    }

    public function estado()
    {
        return $this->belongsTo(\App\EstadoTramite::class, 'estado_tramite_id');
    }

    public function conceptos()
    {
        return $this->hasMany(\App\Concepto::class);
    }

    public function getTotalConceptosAttribute()
    {
        return $this->conceptos->reduce(function ($carry, $item) {
            return $carry + $item->monto;
        });
    }
}
