<?php

namespace App\Models\Lead;

use App\Models\User\Agent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadsActivities extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'leads_activities';
    protected $fillable = [
        'lead_id',
        'activity_by',
        'description',
    ];

    public function lead()
    {
        return $this->belongsTo(Leads::class, 'lead_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'activity_by');
    }
}
