<?php

namespace App\Models\Invoice;

use App\Models\Project\Unit;
use App\Models\User\Buyer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuyerUnits extends Model
{
    use HasFactory;

    protected $table = 'buyer_has_units';

    protected $fillable = [
        'buyer_id',
        'units_id'
    ];

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    public function units(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'units_id');
    }
}
