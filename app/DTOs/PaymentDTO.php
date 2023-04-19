<?php
declare(strict_types=1);

namespace App\DTOs;

class PaymentDTO
{
    public function __construct(
        protected string $payerName,
        protected string $payerSurname,
        protected string $paymentReference,
        protected int $amount,
        protected string $nationalSecurityNumber,
        protected string $description,
    )
    {}

    public function toArray(): array
    {
        return [
            'payerName' => $this->payerName,
            'payerSurname' => $this->payerSurname,
            'paymentReference' => $this->paymentReference,
            'amount' => $this->amount,
            'nationalSecurityNumber' => $this->nationalSecurityNumber
        ];
    }

    /**
     * @return string
     */
    public function getPayerName(): string
    {
        return $this->payerName;
    }

    /**
     * @return string
     */
    public function getPayerSurname(): string
    {
        return $this->payerSurname;
    }

    /**
     * @return string
     */
    public function getPaymentReference(): string
    {
        return $this->paymentReference;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getNationalSecurityNumber(): string
    {
        return $this->nationalSecurityNumber;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
