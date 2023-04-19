<?php
declare(strict_types=1);

namespace App\Console\Commands;

use App\DTOs\PaymentDTO;
use App\Services\Payments\ImportCsvService;
use App\Services\Payments\ValidationService;
use Illuminate\Console\Command;

class ImportPayments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:file {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import payments';

    public function __construct(
        protected ImportCsvService $importCsvService,
        protected ValidationService $validationService
    ){
        parent::__construct();
    }

    /**
     * Handling csv
     *
     * @return void
     */
    public function handle(): void
    {
        $payments = $this->importCsvService->getPayments($this->argument('file'));
        $paymentsObjects = [];

        foreach ($payments as $payment) {
            $paymentsObjects[] = new PaymentDTO(
                $payment['payerName'],
                $payment['payerSurname'],
                $payment['paymentReference'],
                $payment['amount'],
                $payment['nationalSecurityNumber'],
                $payment['description'],
            );
        }

        // check if even one error, won't be saved payment, and exit()
        foreach ($paymentsObjects as $paymentsObject) {
            $this->validationService->validate($paymentsObject, $this);
        }

        // if no errors, then save
        foreach ($paymentsObjects as $paymentObject) {
            $this->importCsvService->savePayments($paymentObject);
        }
    }
}

