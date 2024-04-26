<?php

namespace App\Models\Master;

use App\Enums\StatusMasterData;
use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $table = "promo";

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'code',
        'banner',
        'status',
    ];

    protected $casts = [
        'status'    => StatusMasterData::class
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
