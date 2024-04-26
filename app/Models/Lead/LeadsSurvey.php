<?php

namespace App\Models\Lead;

use App\Models\User\Agent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeadsSurvey extends Model
{
    use HasFactory;

    protected $table = 'lead_survey';
    protected $fillable = [
        'lead_id',
        'agent_id',
        'survey_at',
        'description',
        'image',
    ];

    public $dates = ['survey_at'];

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Leads::class, 'lead_id');
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
