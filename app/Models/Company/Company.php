<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory, SoftDeletes;

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
        'npwp_image',
        'villages_id',
        'address',
        'zip_code',
        'portofolio',
    ];
}
