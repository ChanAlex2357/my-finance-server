<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasCustomId;

class Bank extends Model
{
    use HasFactory, SoftDeletes, HasCustomId;

    protected $fillable = ['id', 'name'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected string $customIdPrefix = 'BNK';
    protected string $customSequenceName = 'banks_id_seq';
}
