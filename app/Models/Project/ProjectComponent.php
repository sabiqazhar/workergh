<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static get()
 */
class ProjectComponent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "project_components";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['icon', 'key', 'name', 'append', 'prepend'];

    public function rent(): BelongsToMany
    {
        return $this->belongsToMany(Rent::class, 'components_has_rents', 'project_components_id', 'rents_id')->withPivot('value');
    }
}
