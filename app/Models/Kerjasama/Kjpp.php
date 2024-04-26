<?php

namespace App\Models\Kerjasama;

use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Kjpp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kjpp';

    protected $fillable = [
        'org_name',
        'phone',
        'email',
        'kjpp_number',
        'address',
        'province',
        'city',
        'office_image',
        'bank_partner',
        'work_partner',
        'portfolio',
        'transaction_rate',
        'status',
    ];

    public function kjppStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function kjppColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }
}
