<?php

namespace App\Models\Lead;

use App\Enums\LeadStatus;
use App\Models\Project\Project;
use App\Models\User\Agent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Propaganistas\LaravelPhone\PhoneNumber;

class Leads extends Model
{
    use HasFactory;

    protected $table = 'leads';
    protected $fillable = [
        'project_id',
        'unit_id',
        'agent_id',
        'name',
        'email',
        'phone',
        'project_name',
        'lead_from',
        'temperature',
        'status',
        'domicile',
        'occupation',
        'purpose',
        'budget',
        'fund_readiness',
    ];

    protected $appends = ['wa_number', 'wa_link'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function activities()
    {
        return $this->hasMany(LeadsActivities::class, 'lead_id');
    }

    public function survey()
    {
        return $this->hasMany(LeadsSurvey::class, 'lead_id');
    }

    public function lastSurvey()
    {
        return $this->hasOne(LeadSurvey::class, 'lead_id')->latest();
    }

    public function collaborator()
    {
        return $this->belongsToMany(Agent::class,'lead_collaborators', 'lead_id', 'agent_id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Units::class, 'unit_id');
    }

    protected function temperature(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    public function leadStatus() : Attribute {
        $status = LeadStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function leadColor() : Attribute {
        $status = LeadStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    protected function phone(): Attribute {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            // set: fn ($value) => PhoneNumber::make($value)->ofCountry('ID'),
        );
    }

    protected function waNumber(): Attribute {
        return new Attribute(
            get: fn () => 'asd',
            // get: fn () => PhoneNumber::make($this->phone, 'ID')->formatE164(),
        );
    }

    protected function waLink(): Attribute {
        return new Attribute(
            get: fn () => "https://wa.me/{$this->wa_number}?text=Hai%20{$this->name}",
        );
    }
}
