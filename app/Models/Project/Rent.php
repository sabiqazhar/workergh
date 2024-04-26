<?php

namespace App\Models\Project;

use App\Models\User\Agent;
use Spatie\Sluggable\HasSlug;
use App\Models\Region\District;
use Spatie\Sluggable\SlugOptions;
use App\Models\Project\RentImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rent extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $table = 'rents';
    protected $fillable = [
        'agent_id',
        'district_id',
        'slug',
        'cover',
        'name',
        'address',
        'price_per_year',
        'description',
        'detail',
        'facilities',
        'latitude',
        'longitude',
        'nearby_facilities',
        'cover',
    ];

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(RentImages::class, 'rent_id');
    }

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(ProjectComponent::class, 'components_has_rents', 'rents_id', 'project_components_id')->withPivot('value');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
