<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
    'invoice_id', 
    'section_id',
    'invoice_number',
    'product',
    'status',
    'status_value',
    'note',
    'user'
    ];

    
}
