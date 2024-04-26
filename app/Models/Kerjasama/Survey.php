<?php

namespace App\Models\Kerjasama;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'survey';
    protected $fillable = [
        'age',
        'occupation',
        'income_month',
        'outcome_month',
        'phone_number',
        'location',
        'buying_plan',
        'downpayment_readiness',
        'house_price',
        'reasons',
        'floor',
        'can_call',
    ];
}
