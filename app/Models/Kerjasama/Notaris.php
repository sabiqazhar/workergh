<?php

namespace App\Models\Kerjasama;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Notaris extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notaris';

    protected $fillable = [
        'name',
        'phone',
        'notaris_number',
        'territory_permit',
        'identity_image',
        'related_association',
        'address',
        'province',
        'city',
        'office_image',
        'bank_partner',
        'work_partner',
        'portfolio',
        'transaction_rate',
        'status'
    ];

    public function notarisStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function notarisColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }
}
