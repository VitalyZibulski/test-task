<?php
declare(strict_types=1);

namespace App\Contracts\Payments;

use App\DTOs\PaymentDTO;

interface ImportPaymentsInterface
{
    public function getPayments(string $file): \Generator;
    public function savePayments(PaymentDTO $row): void;
}
