<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'uuid',
        'customer_id',
        'reference',
        'state',
        'amount_issued',
        'amount_to_pay'
    ];

    public $timestamps = false;
}
