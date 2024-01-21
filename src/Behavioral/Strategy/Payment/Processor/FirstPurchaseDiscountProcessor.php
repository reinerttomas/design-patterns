<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class FirstPurchaseDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->isFirstPurchase();
    }

    public function handle(Client $client, float $amount): float
    {
        return $amount * 0.85; // 15% discount for the first purchase
    }
}
