<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasCustomId;

class AccountInfo extends Model
{
    use HasFactory, SoftDeletes, HasCustomId;

    protected $fillable = ['id', 'etablissement', 'guichet_code', 'account_num', 'rib_key', 'bic', 'iban', 'id_account'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected string $customIdPrefix = 'ACI';
    protected string $customSequenceName = 'account_infos_id_seq';

    public function account()
    {
        return $this->belongsTo(Account::class, 'id_account');
    }
}
