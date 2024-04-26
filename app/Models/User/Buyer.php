<?php

namespace App\Models\User;

use App\Enums\RoleEnum;
use App\Models\Account;
use App\Models\Project\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Buyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'account_id',
        'profile_picture',
        'name',
        'phone_number',
    ];

    protected $table = 'buyer';

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'buyer_has_units', 'buyer_id', 'units_id');
    }
}
