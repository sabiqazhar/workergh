<?php

namespace App\Models\Gather;

use App\Enums\KprOccupation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kpr extends Model
{
    use HasFactory;

    protected $table = 'kpr_calculator';
    protected $fillable = [
        'name',
        'whatsapp',
        'tenor',
        'age',
        'down_payment',
        'income',
        'installment',
        'occupation',
        'domicile',
        'ability'
    ];

    public function kprOccupation(): Attribute
    {
        $kprOccupation = KprOccupation::from($this->occupation)->text();
        return Attribute::make(
            get: fn ($value) => $kprOccupation
        );
    }
}
