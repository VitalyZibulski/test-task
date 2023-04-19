<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CustomerRepository
{
    /**
     * @param int $uuid
     * @return Model|Builder|null
     */
    public function getById(string $uuid): Model|Builder|null
    {
        return Customer::query()->where('uuid', $uuid)->first();
    }
}
