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

    public function getDominioAttribute()
    {
        return $this->vehiculo->first()->dominio;
    }

    public function getTipoTramiteAttribute()
    {
        return $this->belongsTo(\App\TipoTramite::class, 'tipo_tramite_id')->first()->nombre;
    }

    public function getGestorAttribute()
    {
        $gestor = $this->belongsTo(\App\User::class, 'usuario_id')->first();
        return $gestor->apellido.', '.$gestor->nombre;
    }

    public function getEstadoAttribute()
    {
        return $this->belongsTo(\App\EstadoTramite::class, 'estado_tramite_id')->first()->nombre;
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
