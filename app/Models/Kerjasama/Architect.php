<?php

namespace App\Models\Kerjasama;

use App\Enums\ArchitectTypeStatus;
use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Architect extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'architect';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'type',
        'company_name',
        'skills',
        'rate',
        'status',
    ];

    // protected $casts = [
    //     'type' => ArchitectTypeStatus::class,
    // ];

    public function portofolio(): HasMany
    {
        return $this->hasMany(ArchitectPortfolio::class, 'architect_id');
    }

    public function architectStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function architectColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }
}
