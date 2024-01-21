<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class PurchaseHistoryDiscountProcessor implements PaymentProcessor
{
    public function supports(Client $client): bool
    {
        return $client->purchaseHistory() > 5;
    }

    public function handle(Client $client, float $amount): float
    {
        return $amount * 0.92; // 8% discount for loyal customers
    }
}
