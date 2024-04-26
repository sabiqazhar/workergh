<?php

namespace App\Models\Kpr;

use App\Models\Region\Village;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityJob extends Model
{
    use HasFactory;

    protected $table = "identity_job";

    protected $fillable = [
        'doc_id',
        'company_name',
        'company_address',
        'job_type',
        'province',
        'city',
        'district',
        'village',
        'zip_code',
        'business_sector',
        'company_age',
        'total_employee',
        'professional_lifetime',
        'supervisor_name',
        'supervisor_phone',
        'supervisor_job',
        'monthly_turnover',
        'business_margin',
        'ownership_percentage',
    ];

    public function job_document(): BelongsTo
    {
        return $this->belongsTo(JobDocument::class, 'doc_id');
    }
}
