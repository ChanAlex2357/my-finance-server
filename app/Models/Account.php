<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasCustomId;

class Account extends Model
{
    use HasFactory, SoftDeletes, HasCustomId;

    protected $fillable = ['id', 'name', 'description', 'is_active', 'id_bank', 'id_user', 'id_currency'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected string $customIdPrefix = 'ACC';
    protected string $customSequenceName = 'accounts_id_seq';

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'id_currency');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
