<?php

namespace App\Models\GetProject\Getart;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GetArt extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "getart";
}
