<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionApplicant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "transaction_applicant";

    protected $fillable = [
        'kd_kpr',
        'identity_personal_id',
        'kpr_id',
        'job_id',
        'partner_id',
        'income_id',
        'status',
    ];

    public function identity_personal(): BelongsTo
    {
        return $this->belongsTo(IdentityPersonal::class, 'identity_personal_id');
    }

    public function kpr(): BelongsTo
    {
        return $this->belongsTo(Kpr::class, 'kpr_id');
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(IdentityJob::class, 'job_id');
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(IdentityPartner::class, 'partner_id');
    }

    public function income(): BelongsTo
    {
        return $this->belongsTo(Income::class, 'income_id');
    }
}
