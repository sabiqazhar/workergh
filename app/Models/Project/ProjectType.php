<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 */
class ProjectType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "project_types";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id', 'name', 'floor', 'bath_room', 'bed_room', 'carport', 'luas_bangunan', 'spesification', 'cover'
    ];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class, 'project_type_id');
    }

    public function components(): BelongsToMany
    {
        return $this->belongsToMany(ProjectComponent::class, 'project_components_has_project_types', 'project_types_id', 'project_components_id')
            ->withPivot('value');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
