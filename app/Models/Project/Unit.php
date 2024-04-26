<?php

namespace App\Models\Project;

use App\Enums\UnitStatus;
use App\Models\User\Buyer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "units";

    protected $fillable = [
        'project_id',
        'project_type_id',
        'name',
        'luas_tanah',
        'price',
        'status',
        'spesifications',
    ];

    // protected $casts = [
    //     'status' => UnitStatus::class
    // ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function buyers(): BelongsToMany
    {
        return $this->belongsToMany(Buyer::class, 'buyer_has_units', 'units_id', 'buyer_id');
    }

    public function allProgress(): HasMany
    {
        return $this->hasMany(UnitProgress::class, 'unit_id');
    }

    public function maxProgress(): HasOne
    {
        return $this->hasOne(UnitProgress::class, 'unit_id')->orderBy('progress', 'DESC');
    }
}
