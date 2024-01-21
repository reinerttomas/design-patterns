<?php

declare(strict_types=1);

namespace App\Behavioral\Strategy\Payment\Processor;

use App\Behavioral\Strategy\Payment\Model\Client;

class SubscriptionDiscountProcessor implements PaymentProcessor
{
    public function handle(Client $client, float $amount): float
    {
        if ($client->subscription() !== null) {
            if ($client->subscription()->isPremium()) {
                return $amount * 0.8; // 20% discount for premium subscriptions
            }

            if ($client->subscription()->isStandard()) {
                return $amount * 0.9; // 10% discount for standard subscriptions
            }
        }

        return $amount;
    }
}
