<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = ['dominio', 'tipo_vehiculo_id'];

    public function multas()
    {
        return $this->hasMany(\App\Multa::class);
    }

    public function getTotalMultasAttribute()
    {
        return $this->multas->reduce(function ($carry, $item) {
            return $carry + $item->monto;
        });
    }
}
