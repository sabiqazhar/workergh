<?php

namespace App\Models\Project;

use App\Enums\ResidensialStatus;
use App\Models\Region\Village;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "projects";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug', 'company_id', 'logo', 'cover', 'name', 'price_start_from', 'siteplan', 'latitude', 'longitude',
        'adventages', 'nearby_facility', 'facilities', 'house_advantages', 'villages_id', 'address', 'zip_code',
        'brochure', 'booklet', 'is_publish', 'isComplete',
    ];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'project_id');
    }

    public function types(): HasMany
    {
        return $this->hasMany(ProjectType::class, 'project_id');
    }

    public function type_units(): HasManyThrough
    {
        return $this->hasManyThrough(Unit::class, ProjectType::class, 'project_id', 'project_type_id');
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'villages_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImages::class, 'project_id');
    }

    // public function getSlugOptions() : SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('name')
    //         ->saveSlugsTo('slug');
    // }

    // public function projectStatus(): Attribute
    // {
    //     $status = ResidensialStatus::from($this->status)->text();
    //     return Attribute::make(
    //         get: fn ($value) => $status
    //     );
    // }
}
