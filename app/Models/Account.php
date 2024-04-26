<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Enums\RoleEnum;
use App\Models\User\Agent;
use App\Models\User\Buyer;
use App\Enums\AccountStatus;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "accounts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'role'              => RoleEnum::class
    ];

    protected static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public function statusAccount(): Attribute
    {
        $statusAccount = AccountStatus::from($this->status)->code();
        return Attribute::make(
            get: fn ($value) => $statusAccount
        );
    }

    public function statusText(): Attribute
    {
        $statusAccount = AccountStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $statusAccount
        );
    }

    public function statusColor(): Attribute
    {
        $statusAccount = AccountStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $statusAccount
        );
    }

    public function agent(): HasOne
    {
        return $this->hasOne(Agent::class, 'account_id');
    }

    public function buyer() : HasOne
    {
        return $this->hasOne(Buyer::class, 'account_id');
    }
}
