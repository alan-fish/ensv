<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'apellido1', 'apellido2', 'nombre', 'email', 'password',
    ];

    protected $hidden = ['password'];

   
} 