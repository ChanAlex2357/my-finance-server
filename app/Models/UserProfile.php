<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCustomId;

class UserProfile extends Model
{
    use HasFactory, HasCustomId;

    protected $table = 'user_profiles';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'last_name',
        'birth_date',
        'salary',
        'id_user',
        'id_professional_status',
    ];

    // Required for custom ID generation
    protected string $customIdPrefix = 'PRF';
    protected string $customSequenceName = 'user_profiles_id_seq';

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function professionalStatus()
    {
        return $this->belongsTo(ProfessionalStatus::class, 'id_professional_status');
    }
}
