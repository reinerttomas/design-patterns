<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class OrderTotalDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return true;
    }

    public function handle(Client $client, float $amount): float
    {
        if ($amount > 1000) {
            return $amount * 0.85; // 15% discount for large orders
        }

        if ($amount > 500) {
            return $amount * 0.95; // 5% discount for medium-sized orders
        }

        return $amount;
    }
}
