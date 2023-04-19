<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PaymentRepository
{
    /**
     * @param array $paymentData
     * @return Builder|Model
     */
    public static function create(array $paymentData): Model|Builder
    {
        return Payment::query()->create($paymentData);
    }
}
