<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasCustomId;

class Currency extends Model
{
    use HasFactory, SoftDeletes, HasCustomId;

    protected $fillable = ['id', 'val', 'desce'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected string $customIdPrefix = 'CUR';
    protected string $customSequenceName = 'currencies_id_seq';
}
