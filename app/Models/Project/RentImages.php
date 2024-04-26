<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentImages extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'rents_images';
    protected $fillable = [
        'rent_id',
        'url',
    ];

    public function rent(): BelongsTo
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }
}
