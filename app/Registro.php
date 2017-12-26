<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';

    public function consultas()
    {
        return $this->hasMany(\App\Consulta::class, 'registro_id');
    }

    public function getConsultasPendientesCountAttribute()
    {
        return $this->consultas->where('respuesta', null)->count();
    }

    public function getConsultasRespondidasCountAttribute()
    {
        return $this->consultas->where('respuesta', '<>', null)->count();
    }
}
