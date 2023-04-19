<?php
declare(strict_types=1);

namespace App\Contracts\Payments;

use App\DTOs\PaymentDTO;
use Illuminate\Console\Command;

interface ValidationInterface
{
    public function validate(PaymentDTO $payment, Command $command): void;
}
