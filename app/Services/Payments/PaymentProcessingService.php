<?php
declare(strict_types=1);

namespace App\Services\Payments;

use App\DTOs\PaymentDTO;
use App\Enums\LoanStatus;
use App\Enums\PaymentStatus;
use App\Events\LoanFullyProcessed;
use App\Events\RefundProcessed;
use App\Repositories\CustomerRepository;
use App\Repositories\LoanRepository;
use App\Repositories\PaymentRepository;

class PaymentProcessingService
{
    public function __construct(
        protected PaymentRepository $paymentRepository,
        protected LoanRepository $loanRepository,
        protected CustomerRepository $customerRepository
    )
    {}

    /**
     * @param PaymentDTO $paymentDTO
     * @return void
     */
    public function paymentProcess(PaymentDTO $paymentDTO): void
    {
        $currentPayment = $this->paymentRepository->create($paymentDTO->toArray());
        $currentLoan = $this->loanRepository->getByReference($paymentDTO->getDescription());
        $customer = $this->customerRepository->getById($currentLoan->customer_id);

        if ($paymentDTO->getAmount() === $currentLoan->amount_to_pay) {
            $currentLoan->update(['state' => LoanStatus::Paid]);
            $currentPayment->update(['state' => PaymentStatus::Assigned]);
            event(new LoanFullyProcessed($customer));
        }

        if ($paymentDTO->getAmount() > $currentLoan->amount_to_pay) {
            $refund = $currentLoan->amount_to_pay - $paymentDTO->getAmount();
            $currentLoan->update(['state' => LoanStatus::Paid]);
            $currentPayment->update(['state' => PaymentStatus::PartiallyAssigned]);

            event(new RefundProcessed($currentPayment, $refund));
        }
    }
}