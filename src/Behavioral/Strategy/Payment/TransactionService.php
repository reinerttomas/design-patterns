<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

class TransactionService
{
    public function create(Client $client, float $amount): Transaction
    {
        return new Transaction($client, $amount);
    }
}
