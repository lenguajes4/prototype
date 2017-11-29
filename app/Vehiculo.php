<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'dominio', 'tipo_vehiculo_id',
        'provincia_baja_id', 'municipio_baja', 'fecha_baja', 'baja_requerida'
    ];

    public function multas()
    {
        return $this->hasMany(\App\Multa::class);
    }

    public function patentes()
    {
        return $this->hasMany(\App\Patente::class);
    }

    public function getTotalMultasAttribute()
    {
        return $this->multas->reduce(function ($carry, $item) {
            return $carry + $item->monto;
        });
    }

    public function getTotalPatentesAttribute()
    {
        return $this->patentes->reduce(function ($carry, $item) {
            $subtotal = count(json_decode($item->periodos)) * $item->monto_unitario;
            return $carry + $subtotal;
        });
    }

    public function getProvinciaBajaAttribute()
    {
        return $this->belongsTo(\App\Provincia::class, 'provincia_baja_id', 'id')->first()->nombre;
    }
}
