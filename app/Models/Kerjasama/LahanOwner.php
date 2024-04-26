<?php

namespace App\Models\Kerjasama;

use App\Models\Kerjasama\Lahan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class LahanOwner extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'land_owner';

    protected $fillable = [
        'uuid',
        'applicant_name',
        'applicant_phone',
        'applicant_identity_number',
        'applicant_identity_image',
        'applicant_family_number',
        'ownership',
        'owner_name',
        'owner_phone',
        'owner_identity_number',
        'owner_identity_image',
        'owner_relation',
        'procuration',
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

    public function owner()
    {
        return $this->hasOne(Lahan::class, 'land_owner_id');
    }
}
