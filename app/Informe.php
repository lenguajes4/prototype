<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informes';

    protected $fillable = [
        'estado_tramite_id', 'tipo_tramite_id', 'vehiculo_id', 'usuario_id', 'registro_id',
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

    public function registro()
    {
        return $this->belongsTo(\App\Registro::class, 'registro_id');
    }

    public function conceptos()
    {
        return $this->hasMany(\App\Concepto::class);
    }

    public function consultas()
    {
        return $this->hasMany(\App\Consulta::class);
    }

    public function getTotalConceptosAttribute()
    {
        return $this->conceptos->reduce(function ($carry, $item) {
            return $carry + $item->monto;
        });
    }

    public function getStatusAttribute()
    {
        $observaciones = !$this->observaciones ? true : false;
        $conceptos = empty($this->conceptos->toArray()) ? true : false;
        $multas = empty($this->vehiculo->multas->toArray()) ? true : false;
        $patentes = empty($this->vehiculo->patentes->toArray()) ? true : false;

        if ($observaciones && $conceptos && $multas && $patentes) {
            return true;
        }

        return false;
    }
}
