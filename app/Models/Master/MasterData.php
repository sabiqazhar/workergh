<?php

namespace App\Models\Master;

use App\Enums\StatusMasterData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterData extends Model
{
    use HasFactory;

    protected $table = "master_data";

    protected $fillable = [
        'category_id',
        'url_image',
        'alt_image',
        'title',
        'content',
        'status',
    ];

    protected $casts = [
        'status'    => StatusMasterData::class
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
