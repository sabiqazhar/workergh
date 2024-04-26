<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityFamily extends Model
{
    use HasFactory;

    protected $table = "identity_family";

    protected $fillable = [
        'name',
        'address',
        'zip_code',
        'relationship',
        'phone',
        'company_phone',
    ];
}
