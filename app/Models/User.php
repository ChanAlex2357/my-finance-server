<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasCustomId;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasCustomId;

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

    // Required for the trait to work
    protected string $customIdPrefix = 'USR';
    protected string $customSequenceName = 'users_id_seq';

}
