<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasCustomId;

class CashReport extends Model
{
    use HasFactory, SoftDeletes, HasCustomId;

    protected $fillable = ['id', 'description', 'report_date', 'report_amout', 'estimation_amount', 'id_account'];

    public $incrementing = false;
    protected $keyType = 'string';

    protected string $customIdPrefix = 'CRP';
    protected string $customSequenceName = 'cash_reports_id_seq';

    public function account()
    {
        return $this->belongsTo(Account::class, 'id_account');
    }
}
