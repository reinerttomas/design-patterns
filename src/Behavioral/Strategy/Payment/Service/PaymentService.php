<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Service;

use App\Behavioral\Strategy\Payment\Model\Client;
use App\Behavioral\Strategy\Payment\Model\Transaction;
use App\Behavioral\Strategy\Payment\Processor\PaymentProcessor;

class PaymentService
{
    /**
     * @param  iterable<PaymentProcessor>  $processors
     */
    public function __construct(
        private TransactionService $transactionService,
        private iterable $processors,
    ) {
    }

    public function resolvePayment(Client $client, float $amount): Transaction
    {
        $finalAmount = $amount;

        foreach ($this->processors as $processor) {
            if ($processor->supports($client)) {
                $finalAmount = $processor->handle($client, $finalAmount);
            }
        }

        return $this->transactionService->create($client, $finalAmount);
    }
}
