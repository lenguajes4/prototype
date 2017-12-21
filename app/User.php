<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'nickname', 'dni', 'matricula', 'email', 'password', 'telefono',
        'image_path', 'registro_id', 'rol_id', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $rules = [
        'gestor_create' => [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'dni' => 'required|integer|min:1000000|unique:usuarios',
            'telefono' => 'required|string',
            'matricula' => 'required|string|unique:usuarios',
            'email' => 'required|email|unique:usuarios'
        ],
        'gestor_update' => [
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|string'
        ]
    ];

    public function getRules($which)
    {
        return $this->rules[$which];
    }

    public function getNombreCompletoAttribute()
    {
        return $this->apellido.', '.$this->nombre;
    }

    public function rol()
    {
        return $this->belongsTo(\App\Rol::class, 'rol_id');
    }

    public function informe()
    {
        return $this->hasMany(\App\Informe::class, 'usuario_id');
    }

    public function registro()
    {
        return $this->belongsTo(\App\Registro::class, 'registro_id');
    }
}
