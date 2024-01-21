<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment;

class Transaction
{
    public function __construct(
        private Client $client,
        private float $amount
    ) {
    }

    public function client(): Client
    {
        return $this->client;
    }

    public function amount(): float
    {
        return round($this->amount, 4);
    }
}
