<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product',
        'section_id',
        'amount_collection',
        'amount_commission',
        'discount',
        'value_vat',
        'rate_vat',
        'total',
        'status',
        'value_status',
        'note',
        'Payment_date',
        'deleted_at',
        'created_at'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
