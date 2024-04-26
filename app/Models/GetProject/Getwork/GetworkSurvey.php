<?php

namespace App\Models\GetProject\Getwork;

use App\Enums\GetworkType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GetworkSurvey extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "getwork_leads_survey";

    public function leads(): BelongsTo
    {
        return $this->belongsTo(GetworkLeads::class, 'getwork_leads_id');
    }

    public function getworkType(): Attribute
    {
        $getworkType = GetworkType::from($this->type)->text();
        return Attribute::make(
            get: fn ($value) => $getworkType
        );
    }
}
