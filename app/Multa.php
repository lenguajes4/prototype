<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multas';
    
    protected $fillable = ['vehiculo_id', 'jurisdiccion_id', 'acta', 'monto'];

    protected $rules = [
        'vehiculo_id' => 'required|integer',
        'jurisdiccion_id' => 'required|integer',
        'acta' => 'required|integer|min:1',
        'monto' => 'required|integer|min:1'
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
