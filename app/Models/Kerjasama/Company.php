<?php

namespace App\Models\Kerjasama;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Models\Kerjasama\Developer;
use App\Models\Region\Village;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $table = 'companies';

    protected $fillable = [
        'developer_id',
        'slug',
        'logo',
        'name',
        'pt_name',
        'phone',
        'type',
        'nib',
        'nib_image',
        'npwp_number',
        'villages_id',
        'npwp_image',
        'address',
        'portfolio'
    ];

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'villages_id');
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class, 'developer_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(100);
    }
}
