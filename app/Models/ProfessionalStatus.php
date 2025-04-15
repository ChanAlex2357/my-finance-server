<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomId;

class ProfessionalStatus extends Model
{
    use HasFactory, HasCustomId;

    protected $table = 'professional_status';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'val',
        'desce',
    ];

    // Required for custom ID generation
    protected string $customIdPrefix = 'PRO'; // Or 'PST' if you prefer
    protected string $customSequenceName = 'professional_status_id_seq';
}
