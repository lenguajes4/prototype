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
        return $this->consultas->where('estado_consulta_id', 1)->count();
    }

    public function getConsultasRespondidasCountAttribute()
    {
        return $this->consultas->where('estado_consulta_id', 2)->count();
    }

    public function getConsultasBorradorCountAttribute()
    {
        return $this->consultas->where('estado_consulta_id', 3)->count();
    }
}
