<?php

namespace App\Models\Kpr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpr extends Model
{
    use HasFactory;

    protected $table = "kpr";

    protected $fillable = [
        'family_card',
        'last_payroll',
        'last_salary',
        'work_statement',
        'marriage_book',
        'identity_card',
        'pass_photo',
    ];
}
