<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityPartner extends Model
{
    use HasFactory;

    protected $table = "identity_partner";

    protected $fillable = [
        'job_id',
        'name',
        'phone',
        'npwp',
        'identity_number',
        'birth_place',
        'birth_date',
        'family_dependent',
        'income',
        'company_phone',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(IdentityJob::class, 'job_id');
    }
}
