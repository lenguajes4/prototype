<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'conceptos';

    protected $fillable = ['informe_id', 'nombre', 'monto'];

    protected $rules = [
        'nombre' => 'required',
        'monto' => 'required|integer|min:1'
    ];

    public function getRules()
    {
        return $this->rules;
    }
}
