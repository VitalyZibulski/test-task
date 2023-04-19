<?php
declare(strict_types=1);

namespace App\Jobs;

use App\DTOs\PaymentDTO;
use App\Events\FailedPayment;
use App\Events\PaymentRecieved;
use App\Services\Payments\PaymentProcessingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ProcessPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected PaymentDTO $payment){}

    /**
     * Execute the job.
     *
     * @param PaymentProcessingService $processingService
     * @return void
     */
    public function handle(
        PaymentProcessingService $processingService
    ): void
    {
        $payment = $this->payment;

        try {
            DB::transaction(function() use ($payment, $processingService) {
                $processingService->paymentProcess($payment);
            });

            event(new PaymentRecieved($payment));
        } catch (\Throwable $e) {
            $message = 'Payment '. $payment->getPaymentReference() . 'hasn\'t been processed';
            event(new FailedPayment($message));
            logger()->info($message . $e->getMessage());
        }
    }
}
