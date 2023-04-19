<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer_name',
        'payer_surname',
        'refund',
        'national_security_number',
        'payment_reference_id',
        'description',
        'refund'
    ];
}
