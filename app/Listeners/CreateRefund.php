<?php

namespace App\Listeners;

use App\Events\RefundProcessed;
use App\Repositories\PaymentOrderRepository;
use App\Repositories\PaymentRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateRefund
{
    public $afterCommit = true;
    public function __construct(private PaymentOrderRepository $paymentOrderRepository){}

    /**
     * Handle the event.
     *
     * @param RefundProcessed $event
     * @return void
     */
    public function handle(RefundProcessed $event)
    {
        $payment = $event->payment;
        $refund = $event->refund;

        $this->paymentOrderRepository->create([
            'payer_name' => $payment->payer_name,
            'payer_surname' => $payment->payer_name,
            'refund' => $refund,
            'national_security_number' => $payment->national_security_number,
            'payment_reference_id' => $payment->payment_reference_id,
            'description' => $payment->description,
        ]);

    }
}
