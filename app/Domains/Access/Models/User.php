<?php

namespace App\Domains\Access\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','username', 'email', 'password','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNameAttribute($value)
    {
        return mb_strtoupper($value,'UTF-8');
    }

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = mb_strtoupper($value,"UTF-8");
    }
}
