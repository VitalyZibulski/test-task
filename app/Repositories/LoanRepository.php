<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LoanRepository
{
    /**
     * @param string $reference
     * @return Model|Builder|null
     */
    public function getByReference(string $reference): Model|Builder|null
    {
        return Loan::query()->where('reference', $reference)->first();
    }
}
