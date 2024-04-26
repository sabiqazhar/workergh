<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlipperLead extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "flipper_leads";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'flipper_id',
        'name',
        'phone',
        'other_questions',
        'discuss_on',
        'status'
    ];

    public function flipper(): BelongsTo
    {
        return $this->belongsTo(Flipper::class, 'flipper_id');
    }
}
