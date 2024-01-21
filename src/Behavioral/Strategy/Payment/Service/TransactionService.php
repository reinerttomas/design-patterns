<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Service;

use App\Behavioral\Strategy\Payment\Model\Client;
use App\Behavioral\Strategy\Payment\Model\Transaction;

class TransactionService
{
    public function create(Client $client, float $amount): Transaction
    {
        return new Transaction($client, $amount);
    }
}
