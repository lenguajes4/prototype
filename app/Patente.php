<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{
    protected $table = 'patentes';
    
    protected $fillable = ['vehiculo_id', 'jurisdiccion_id', 'year', 'periodos', 'monto_unitario'];

    protected $rules = [
        'jurisdiccion_id' => 'required|integer',
        'year' => 'required|integer|between:1990,2018',
        'periodos' => 'required',
        'monto_unitario' => 'required|integer|min:1'
    ];

    public function getRules()
    {
        return $this->rules;
    }

    public function getJurisdiccionAttribute()
    {
        return $this->belongsTo(\App\Jurisdiccion::class, 'jurisdiccion_id')->first()->nombre;
    }
}
