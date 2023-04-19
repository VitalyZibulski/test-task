<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\PaymentOrder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PaymentOrderRepository
{
    /**
     * @param array $refundData
     * @return Model|Builder
     */
    public static function create(array $refundData): Model|Builder
    {
        return PaymentOrder::query()->create($refundData);
    }
}
