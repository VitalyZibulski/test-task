<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer_name',
        'payer_surname',
        'amount',
        'national_security_number',
        'payment_reference_id',
        'payment_date',
        'description',
        'state'
    ];

    public $timestamps = false;
}
