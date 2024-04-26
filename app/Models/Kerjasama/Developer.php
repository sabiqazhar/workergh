<?php

namespace App\Models\Kerjasama;

use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Developer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'developers';

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'position',
        'address',
        'status'
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'developer_id');
    }

    public function developerStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function developerColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }
}
