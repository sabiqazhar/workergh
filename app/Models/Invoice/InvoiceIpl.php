<?php

namespace App\Models\Invoice;

use App\Models\Project\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class InvoiceIpl extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ipl_invoice';

    protected $fillable = [
        'unit_id',
        'uuid',
        'invoice_number',
        'amount',
        'status',
    ];

    public function units(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    protected static function booted()
    {
        static::creating(function($model) {
            $model->uuid = Uuid::uuid4();
        });
    }

    public static function generateInvoiceNumber()
    {
        $number = self::where("invoice_number", "like", now()->format("Ym") . "%")->max("invoice_number");

        if ($number) {
            $exp = explode(now()->format("Ym"), $number);
            return now()->format("Ymd") . sprintf("%05s", substr($exp[1], 2)+1);
        }

        return now()->format("Ymd") . sprintf("%05s", 1);
    }
}
