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
        'nombre', 'apellido', 'nickname', 'dni', 'matricula', 'email', 'password',
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

    public function getNombreCompletoAttribute()
    {
        return $this->apellido.', '.$this->nombre;
    }

    public function rol()
    {
        return $this->belongsTo(\App\Rol::class, 'rol_id');
    }
}
