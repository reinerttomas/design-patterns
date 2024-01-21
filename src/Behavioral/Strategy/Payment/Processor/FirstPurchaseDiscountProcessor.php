<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class FirstPurchaseDiscountProcessor implements PaymentProcessor
{
    public function handle(Client $client, float $amount): float
    {
        if ($client->isFirstPurchase()) {
            return $amount * 0.85; // 15% discount for the first purchase
        }

        return $amount;
    }
}
