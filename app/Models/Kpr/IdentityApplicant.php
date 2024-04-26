<?php

namespace App\Models\Kpr;

use App\Models\Region\Village;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityApplicant extends Model
{
    use HasFactory;

    protected $table = "identity_applicant";

    protected $fillable = [
        'address',
        'rt',
        'rw',
        'identity_number',
        'npwp',
        'domicile_address',
        'province',
        'city',
        'district',
        'village',
        'zip_code',
        'education',
        'dependent',
    ];
}
