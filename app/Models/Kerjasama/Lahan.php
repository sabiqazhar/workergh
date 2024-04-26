<?php

namespace App\Models\Kerjasama;

use App\Enums\KerjasamaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Lahan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lands';

    protected $fillable = [
        'land_owner_id',
        'uuid',
        'address',
        'land_area',
        'land_area_choose',
        'price_meter',
        'price_range',
        'pbb_number',
        'pbb_image_1',
        'pbb_image_2',
        'certificate_type',
        'certificate_number',
        'certificate_image',
        'zonasi',
        'type_of_zonasi',
        'gmaps_url',
        'gmaps_address',
        'latitude',
        'longitude',
        'scheme',
        'car_access',
        'is_negotiate',
        'status'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public function landStatus() : Attribute {
        $status = KerjasamaStatus::from($this->status)->text();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function landColor() : Attribute {
        $status = KerjasamaStatus::from($this->status)->color();
        return Attribute::make(
            get: fn ($value) => $status
        );
    }

    public function owner()
    {
        return $this->belongsTo(LahanOwner::class, 'land_owner_id');
    }
}
