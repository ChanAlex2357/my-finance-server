<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'email',
        'password',
        'token',
        'token_expiration',
    ];

    protected $hidden = [
        'password',
        'token',
    ];

    protected $casts = [
        'token_expiration' => 'datetime',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
