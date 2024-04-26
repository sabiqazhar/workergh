<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityPersonal extends Model
{
    use HasFactory;

    protected $table = "identity_personal";

    protected $fillable = [
        'family_id',
        'identity_id',
        'first_name',
        'mid_name',
        'last_name',
        'email',
        'phone',
        'handphone_number',
        'gender',
        'birth_place',
        'birth_date',
        'religion',
        'income',
    ];

    public function family(): BelongsTo
    {
        return $this->belongsTo(IdentityFamily::class, 'family_id');
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(IdentityApplicant::class, 'identity_id');
    }
}
