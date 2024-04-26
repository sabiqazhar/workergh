<?php

namespace App\Models\Kerjasama;

use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Foreman extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'foremans';

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'identity_number',
        'identity_image',
        'domicile',
        'number_of_workers',
        'skills',
        'portofolio_file',
        'portofolio_image',
        'experience',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public function foremanStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function foremanColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }
}
