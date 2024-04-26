<?php

namespace App\Models\GetProject\Getwork;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GetworkLeads extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "getwork_leads";

    public function survey(): HasOne
    {
        return $this->hasOne(GetworkSurvey::class, 'getwork_leads_id');
    }
}
