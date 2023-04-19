<?php
declare(strict_types=1);

namespace App\Services\Payments;

use App\Contracts\Payments\ImportPaymentsInterface;
use App\DTOs\PaymentDTO;
use App\Jobs\ProcessPayment;
use App\Repositories\PaymentRepository;

class ImportCsvService implements ImportPaymentsInterface
{
    /**
     * @param string $file
     * @return \Generator
     */
    public function getPayments(string $file): \Generator
    {
        try {
            $filename = storage_path($file);

            return ParserCsvService::parseCsv($filename);
        } catch (\Exception $e) {
            logger()->info("Error ". $e->getMessage());
        }
    }


    /**
     * @param PaymentDTO $row
     * @return void
     */
    public function savePayments(PaymentDTO $row): void
    {
        ProcessPayment::dispatch($row);
    }
}
