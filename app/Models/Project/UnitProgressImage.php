<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UnitProgressImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'progress_images';
    protected $fillable  = [
        'progress_unit_id',
        'url',
    ];

    public function progressUnit(): BelongsTo
    {
        return $this->belongsTo(UnitProgress::class, 'progress_unit_id');
    }
}
