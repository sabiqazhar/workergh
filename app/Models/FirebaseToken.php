<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FirebaseToken extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'firebase_token';

    protected $fillable = [
        'account_id',
        'device_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'device_token',
    ];

    public function account(): HasOne
    {
        return $this->hasOne(Account::class, 'account_id');
    }
}
