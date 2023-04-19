<?php
declare(strict_types=1);

namespace App\Enums;

enum PaymentStatus: string
{
    case Assigned = 'assigned';
    case PartiallyAssigned = 'partially assigned';
}
