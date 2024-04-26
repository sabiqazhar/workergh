<?php

namespace App\Models\Kerjasama;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArchitectPortfolio extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'architect_portfolio';
    protected $fillable = [
        'architect_id',
        'file',
        'type'
    ];

    public function architect(): BelongsTo
    {
        return $this->belongsTo(Architect::class, 'architect_id');
    }
}
