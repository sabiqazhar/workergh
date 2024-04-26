<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmissionTransaction extends Model
{
    use HasFactory;

    protected $table = "submission_transaction";

    protected $fillable = [
        'transaction_applicant_id',
        'document',
        'file',
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(TransactionApplicant::class, 'transaction_applicant_id');
    }
}
