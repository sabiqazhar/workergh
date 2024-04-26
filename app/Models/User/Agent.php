<?php

namespace App\Models\User;

use App\Models\Account;
use App\Models\Lead\Leads;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'agents';
    protected $fillable = [
        'account_id',
        'username',
        'profile_picture',
        'name',
        'phone',
        'wa_number',
        'gender',
        'address',
        'zip_code',
        'is_internal',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function collaborator()
    {
        return $this->belongsToMany(Leads::class, 'lead_collaborators','agent_id','lead_id');
    }
}
