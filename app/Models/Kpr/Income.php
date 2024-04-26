<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = "income";

    protected $fillable = [
        'income_type',
        'total_income',
        'living_expanse',
        'total_installment',
        'expanse',
        'monthly_expanse',
        'remaining_income',
        'others',
    ];
}
