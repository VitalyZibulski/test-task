<?php
declare(strict_types=1);

namespace App\Services\Payments;

use App\Contracts\Payments\ValidationInterface;
use App\DTOs\PaymentDTO;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class ValidationService implements ValidationInterface
{
    /**
     * @param PaymentDTO $payment
     * @param Command $command
     * @return void
     */
    public function validate(PaymentDTO $payment, Command $command): void
    {
        // validation rules
        $validator = Validator::make($payment->toArray(), [
            'payerName' => 'required',
            'payerSurname' => 'required',
            'paymentReference' => 'required|unique:payments,payment_reference_id',
            'amount' => 'required|integer'
        ]);

        $errors = $validator->errors();

        // if exists errors
        // use logger helper for logging
        // use command for console error
        // then exit()
    }
}
