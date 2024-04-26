<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmissionKpr extends Model
{
    use HasFactory;

    protected $table = "submission_kpr";

    protected $fillable = [
        'transaction_applicant_id',
        'unit_id',
        'unit_url',
        'branch_id',
        'submission_type',
        'loan_type',
        'price_application',
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(TransactionApplicant::class, 'transaction_applicant_id');
    }
}
