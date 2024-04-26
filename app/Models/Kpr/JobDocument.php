<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDocument extends Model
{
    use HasFactory;

    protected $table = "job_document";

    protected $fillable = [
        'bank_statement',
        'rent_building',
        'business_image',
        'business_permit',
        'financial_statement',
    ];
}
