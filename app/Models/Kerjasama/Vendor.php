<?php

namespace App\Models\Kerjasama;

use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Ramsey\Uuid\Uuid;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    const TYPE_VENDOR   = 1;
    const TYPE_SUPPLIER = 2;

    protected $table = 'vendors';

    protected $fillable = [
        'uuid',
        'company_name',
        'type',
        'legal_number',
        'legal_image',
        'owner_name',
        'owner_identity_number',
        'owner_identity_image',
        'phone',
        'domicile',
        'email',
        'company_profile',
        'price_list',
        'category_of_vendor',
        'category_of_supplier',
        'type_of_supplier',
        'type_of_materials',
        'status'
    ];

    protected static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public function vendorStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function vendorColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }
}
